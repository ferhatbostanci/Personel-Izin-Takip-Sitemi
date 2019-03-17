<?php

class Users extends Controller{

    public function __construct(){
        //$this->userModel = $this->model('User');
    }

    /*
     * Pages
     */

    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }else{
            $data = [
                'title' => SITENAME . ' - Giriş Yap',
                'js' => array('/js/plugins/sweetalert2/sweetalert2.all.min.js'),
            ];
            $this->view('users/login', $data);
        }
    }

}