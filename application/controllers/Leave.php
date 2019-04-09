<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('staff_model');
        $this->load->model('leave_model');

        if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));
        if($this->session->userdata('lock')) redirect('users/lock');

    }

    public function add()
    {

        $data = array(
            'title' => 'ALKÜ PİTS - İzni Ekle',
            'stafflist' => $this->staff_model->getActiveStaffList(),
            'leavetypes' => $this->staff_model->getLeaveTypes(),
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
        $this->load->view('leave/add', $data);

    }

    public function list(){

        $leavehistory = $this->staff_model->getDetailLeaveHistory();

        $data = array(
            'title' => 'ALKÜ PİTS - İzni Listesi',
            'leavehistory' => $leavehistory,
            'cssload' => array(
                'assets/js/plugins/datatables/dataTables.bootstrap4.css'
            ),
            'jsload' => array(
                'plugins/datatables/jquery.dataTables.min.js',
                'plugins/datatables/dataTables.bootstrap4.min.js',
                'pages/be_tables_datatables.min.js'
            )
        );
        $this->load->view('leave/list', $data);

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
                'field' => 'startdate',
                'label' => 'Tarih',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            ),
            array(
                'field' => 'enddate',
                'label' => 'Tarih',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            ),
            array(
                'field' => 'leavetype',
                'label' => 'İzin Türü',
                'rules' => 'required|callback_check_leave_type',
                'errors' => array(
                    'required' => '%s boş bırakılamaz.'
                )
            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == TRUE){

            $startdate = str_replace('/', '-', $this->input->post('startdate'));
            $enddate = str_replace('/', '-', $this->input->post('enddate'));

            // Get work day
            $startdatework = date("Y/m/d", strtotime($startdate));
            $enddatework = date("Y/m/d", strtotime($enddate));
            $workday = getWorkdays($startdatework, $enddatework);

            // Convert date
            $startdate = date("Y-m-d", strtotime($startdate));
            $enddate = date("Y-m-d", strtotime($enddate));

            // Day interval
            $datetime1 = date_create($startdate);
            $datetime2 = date_create($enddate);
            $interval = date_diff($datetime1, $datetime2);
            $interval = $interval->format('%a')+1;

            $this->staff_model->addLeaveHistory($this->input->post('staffid'), $this->session->userdata('user_id'), $startdate, $enddate, $interval, $this->input->post('leavetype'));

            $this->session->set_flashdata('add_message',
                array(
                    'title' => 'Kayıt Tamamlandı!',
                    'text' => 'Personel izni başarıyla eklendi. İzin listesinden kontrol edebilirsiniz.',
                    'type' => 'success'
                )
            );
            redirect(current_url());

        }else{
            $data = array(
                'title' => 'İzni Ekle',
                'stafflist' => $this->staff_model->getStaffList(),
                'leavetypes' => $this->staff_model->getLeaveTypes(),
                'cssload' => array(
                    'assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                    'assets/js/plugins/select2/css/select2.min.css'
                ),
                'jsload' => array(
                    'plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                    'plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js',
                    'plugins/select2/js/select2.full.min.js'
                )
            );

            $this->load->view('leave/add', $data);
        }

    }

    public function delete_leave_history(){
        $id = $this->input->input_stream('id');
        $this->leave_model->deleteLeaveHistory($id);
    }


    /*
     * Check
     */

    public function check_leave_type($id)
    {
        if($id == 0){
            $this->form_validation->set_message('check_leave_type', '%s boş bırakılamaz.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}