<?php

class ResponseError extends Controller {

    public function error404(){
        $data = [
            'title' => '404'
        ];

        $this->view('404', $data);
    }

}