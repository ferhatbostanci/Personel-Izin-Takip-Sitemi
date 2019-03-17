<?php

class Index extends Controller {

    public function __construct(){

    }

    public function index(){
        if(!isLoggedIn()){
            redirect('users/login');
            exit;
        }

        $data = [
            'title' => SITENAME
        ];

        $this->view('index', $data);
    }

}