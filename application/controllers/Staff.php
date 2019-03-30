<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('staff_model');
    }

    public function add()
    {

        if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));

        $data = array('title' => 'ALKÜ PİTS - Personel Ekle');
        $this->load->view('staff/add', $data);

    }

    public function list()
    {

        if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));

        $data = array(
            'title' => 'ALKÜ PİTS - Personel Listesi',
            'stafflist' => $this->staff_model->getActiveStaffList(),
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

        if(!$staff) redirect('staff/list');


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

        if(!$this->input->post()) redirect('staff/add');

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
                'rules' => 'trim|required|max_length[50]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
                    'max_length' => '{field} alanının uzunluğu {param} karakteri aşamaz'
                )
            )
        );
        $this->form_validation->set_rules($config);


        if($this->form_validation->run() === TRUE){

            $this->staff_model->addStaff($this->input->post('name'), $this->input->post('surname'), $this->input->post('title'));
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

        if(!$this->input->post()) redirect('staff/list');

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
                'rules' => 'trim|required|max_length[50]',
                'errors' => array(
                    'required' => '%s boş bırakılamaz',
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



            //redirect(base_url('staff/list'));
        }else{
            $data = array('title' => 'ALKÜ PİTS - Personel Düzenle');
            $this->load->view('staff/edit', $data);
        }

    }

}