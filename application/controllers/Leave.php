<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('staff_model');

        if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));
        if($this->session->userdata('lock')) redirect('users/lock');

    }

    public function add()
    {

        $data = array(
            'title' => 'İzni Ekle',
            'stafflist' => $this->staff_model->getStaffList(),
            'leavetypes' => $this->staff_model->getLeaveTypes(),
            'jsload' => array(
                'plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                'plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js',
                'plugins/select2/js/select2.full.min.js'
            )
        );

        $this->load->view('leave/add', $data);

    }

    public function add_valid(){

        if(!$this->input->post()) show_404();

        $startdate = str_replace('/', '-', $this->input->post('startdate'));
        $enddate = str_replace('/', '-', $this->input->post('enddate'));
        $startdate = date("Y/m/d", strtotime($startdate));
        $enddate = date("Y/m/d", strtotime($enddate));

        echo getWorkdays($startdate, $enddate);

    }

}