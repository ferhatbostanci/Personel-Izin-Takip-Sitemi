<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('staff_model');
    }

	public function index()
	{

	    if(!$this->session->userdata('logged_in')) redirect(base_url('users/login'));

	    $data = array(
	        'title' => 'ALKÜ PİTS - Ana Sayfa'
        );
		$this->load->view('home/index', $data);

        //$this->output->enable_profiler(TRUE);
	}

}