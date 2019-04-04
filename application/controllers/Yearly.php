<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yearly extends CI_Controller{

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

        $data = array(
            'title' => 'ALKÜ PİTS - Yıllık Hak Ekle',
            'stafflist' => $this->staff_model->getActiveStaffList(),
            'cssload' => array(
                'assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                'assets/js/plugins/select2/css/select2.min.css'
            ),
            'jsload' => array(
                'plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                'plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js',
                'plugins/select2/js/select2.full.min.js',
                'plugins/bootstrap-notify/bootstrap-notify.min.js'
            )
        );
        $this->load->view('yearly/add', $data);

    }

    public function list(){

        $yearlyLeaveDataAll = $this->staff_model->getYearlyLeaveDataAll();

        $data = array(
            'title' => 'ALKÜ PİTS - Yıllık Hak Listesi',
            'yearlyleave' => $yearlyLeaveDataAll,
            'cssload' => array(
                'assets/js/plugins/datatables/dataTables.bootstrap4.css'
            ),
            'jsload' => array(
                'plugins/datatables/jquery.dataTables.min.js',
                'plugins/datatables/dataTables.bootstrap4.min.js',
                'pages/be_tables_datatables.min.js'
            )
        );
        $this->load->view('yearly/list', $data);

    }


    /*
     * POST Validation
     */

    public function add_valid(){

        if(!$this->input->post()) show_404();

        $config = array(
            array(
                'field' => 'staffid',
                'label' => 'Personel',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s adresi boş bırakılamaz.'
                ),
            ),
            array(
                'field' => 'year',
                'label' => 'Yıl',
                'rules' => 'required|callback_check_year',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            ),
            array(
                'field' => 'day',
                'label' => 'Gün sayısı',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == TRUE){

            $staffid = $this->input->post('staffid');
            $year = $this->input->post('year');
            $day = $this->input->post('day');

            echo $this->staff_model->addYearlyLeaveData($staffid, $year, $day);

        }else{
            $this->add();
        }

    }


    /*
     * Check
     */

    public function check_year()
    {
        $staffid = $this->input->post('staffid');
        $year = $this->input->post('year');

        $yearlydata = $this->staff_model->getYearlyLeaveData($staffid, $year);

        if($yearlydata){
            $this->form_validation->set_message('check_year', '%s zaten kayıt edilmiş.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}