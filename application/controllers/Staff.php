<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('staff_model');

        if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));
        if($this->session->userdata('lock')) redirect('users/lock');

    }

    public function add()
    {

        $data = array('title' => 'ALKÜ PİTS - Personel Ekle');
        $this->load->view('staff/add', $data);

    }

    public function list()
    {

        $data = array(
            'title' => 'ALKÜ PİTS - Personel Listesi',
            'stafflist' => $this->staff_model->getStaffList(),
            'cssload' => array(
                'assets/js/plugins/datatables/dataTables.bootstrap4.css'
            ),
            'jsload' => array(
                'plugins/datatables/jquery.dataTables.min.js',
                'plugins/datatables/dataTables.bootstrap4.min.js',
                'pages/be_tables_datatables.min.js'
            )
        );
        $this->load->view('staff/list', $data);

    }

    public function edit($id = NULL){

        $staff = $this->staff_model->isStaff($id);

        if(!$staff) show_404();

        $data = array(
            'title' => 'ALKÜ PİTS - Personel Düzenle',
            'staff' => $staff,
        );
        $this->load->view('staff/edit', $data);

    }


    /*
     * POST Validation
     */

    public function add_valid()
    {

        if(!$this->input->post()) show_404();

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
                'field' => 'title',
                'label' => 'Ünvan',
                'rules' => 'trim|max_length[50]',
                'errors' => array(
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            )
        );
        $this->form_validation->set_rules($config);


        if($this->form_validation->run() === TRUE){

            $this->staff_model->addStaff($this->input->post('name'), $this->input->post('surname'), $this->input->post('title'), $this->input->post('tenyear'));
            $this->session->set_flashdata('add_message',
                array(
                    'title' => 'Kayıt Tamamlandı!',
                    'text' => 'Personel başarıyla eklendi. Personel listesinden kontrol edebilirsiniz.',
                    'type' => 'success'
                )
            );
            redirect(base_url('staff/add'));

        }else{
            $data = array('title' => 'ALKÜ PİTS - Personel Düzenle');
            $this->load->view('staff/add', $data);
        }

    }

    public function edit_valid(){

        if(!$this->input->post()) show_404();

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
                'field' => 'title',
                'label' => 'Ünvan',
                'rules' => 'trim|max_length[50]',
                'errors' => array(
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() === TRUE){
            $this->session->set_flashdata('add_message',
                array(
                    'title' => 'Güncelleme Tamamlandı!',
                    'text' => 'Personel bilgileri başarıyla güncellendi. Personel listesinden kontrol edebilirsiniz.',
                    'type' => 'success'
                )
            );
            $this->staff_model->updateStaff($this->input->post('id'), $this->input->post('name'), $this->input->post('surname'), $this->input->post('title'), $this->input->post('tenyear'));
            redirect(base_url('staff/list'));
        }else{
            $data = array('title' => 'ALKÜ PİTS - Personel Düzenle');
            $this->load->view('staff/edit', $data);
        }

    }


    /*
     * POST Request
     */

    public function change(){

        if(!$this->input->post()) show_404();
        if($this->input->post('status') > 1 || $this->input->post('status') < 0) show_404();

        echo $this->staff_model->changeStaffActive($this->input->post('id'), $this->input->post('status'));

    }

}