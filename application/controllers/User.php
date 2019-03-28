<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $this->load->view('user/index');

        $this->output->enable_profiler(TRUE);
    }

    public function login()
    {
        $this->load->view('user/index');

        $this->output->enable_profiler(TRUE);
    }

}