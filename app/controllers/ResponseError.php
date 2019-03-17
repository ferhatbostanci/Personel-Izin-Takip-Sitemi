<?php

class ResponseError extends Controller {

    public function error404(){
        $data = [
            'title' => 'Ooops!'
        ];

        $this->view('404', $data);
    }

}