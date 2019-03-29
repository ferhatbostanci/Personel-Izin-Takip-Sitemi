<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function login()
    {

        $data = ['title' => 'Giriş Yap'];
        $this->load->view('users/login', $data);

    }

    public function register()
    {

        $data = ['title' => 'Kayıt Ol'];
        $this->load->view('users/register', $data);

    }


    /*
     * GET
     */

    public function activation()
    {

        if(!$this->input->get()) redirect('users/login');

        if($this->user_model->isUserActive($this->input->get('email'))){
            $this->session->set_flashdata('activation_message',
                array(
                    'title' => 'İşlem Yapılmadı!',
                    'text' => 'Hesabınız zaten aktif. Sisteme E-Posta ve parolanızı kullanarak giriş yapabilirsiniz.',
                    'type' => 'info'
                )
            );
            redirect('users/login');
        }else{
            if($this->user_model->activeUser($this->input->get('email'), $this->input->get('code'))){
                $this->session->set_flashdata('activation_message',
                    array(
                        'title' => 'Aktivasyon Tamamlandı!',
                        'text' => 'Hesabınız aktif edildi. Sisteme E-Posta ve parolanızı kullanarak giriş yapabilirsiniz.',
                        'type' => 'success'
                    )
                );
                redirect('users/login');
            }else{
                $this->session->set_flashdata('activation_message',
                    array(
                        'title' => 'Aktivasyon Başarısız!',
                        'text' => 'Aktivasyon kodunuz eşleşmiyor. Lütfen gönderilen linki kontrol ediniz.',
                        'type' => 'error'
                    )
                );
                redirect('users/login');
            }

        }

    }

    /*
     * POST Validation
     */

    public function login_valid()
    {
        if(!$this->input->post()) redirect('users/login');

        $config = array(
            array(
                'field' => 'email',
                'label' => 'E-Posta',
                'rules' => 'trim|required|valid_email',
                'errors' => array(
                    'required' => '%s adresi boş bırakılamaz.',
                    'valid_email' => 'Geçerli bir %s adresi giriniz.'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Parola',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == TRUE){



        }else{
            $data = ['title' => 'Hata!'];
            $this->load->view('users/login', $data);
        }

    }

    public function register_valid()
    {

        if(!$this->input->post()) redirect('users/register');

        $config = array(
            array(
                'field' => 'name',
                'label' => 'Ad',
                'rules' => 'trim|required|max_length[50]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            ),
            array(
                'field' => 'surname',
                'label' => 'Soyad',
                'rules' => 'trim|required|max_length[50]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'E-Posta adresi',
                'rules' => 'trim|required|valid_email|is_unique[users.email]|max_length[50]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
                    'valid_email' => 'Geçerli bir %s giriniz',
                    'is_unique' => '%s zaten kullanılıyor',
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Parola',
                'rules' => 'trim|required|min_length[6]|max_length[32]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
                    'min_length' => '{field} alanı en az {param} karakter olmalı',
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            ),
            array(
                'field' => 'passwordconfirm',
                'label' => 'Parola',
                'rules' => 'trim|required|matches[password]',
                'errors' => array(
                    'required' => '%s tekrarı boş bırakılamaz',
                    'matches' => '%snız ile eşleşmiyor',
                )
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() === TRUE){

            $password_hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $activation_code = md5(uniqid(mt_rand(), true));

            $isRegistered = $this->user_model->register($password_hash, $activation_code);
            $this->user_model->sendEmailVerification($this->input->post('email'), $activation_code);

            if($isRegistered){
                $this->session->set_flashdata('register_message',
                    array(
                        'title' => 'Kayıt Tamamlandı!',
                        'text' => 'E-Posta adresinize gönderilen aktivasyon linkinden hesabınızı aktif edebilirsiniz.',
                        'type' => 'success'
                    )
                );
                redirect(current_url());
            }else{
                $this->session->set_flashdata('register_message',
                    array(
                        'title' => 'Kayıt Başarısız!',
                        'text' => 'Kayıt işlemi sırasında hata oluştu! Lütfen sistem yöneticilerine başvurunuz.',
                        'type' => 'error'
                    )
                );
            }

        }

        $data = ['title' => 'Kayıt Ol'];
        $this->load->view('users/register', $data);

    }

}