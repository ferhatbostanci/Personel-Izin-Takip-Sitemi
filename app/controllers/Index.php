<?php

class Index extends Controller {

    public function __construct(){

    }

    public function index(){
        $data = [
            'title' => 'Test Title'
        ];

        $this->view('index', $data);
    }

}