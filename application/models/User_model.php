<?php

class User_model extends CI_Model {

    /*
     * GET
     */

    public function login($email, $password){
        $this->db->where('email', $email);
        $result = $this->db->get('users')->row();
        if(password_verify($password, $result->password)){
            return $result;
        }else{
            return false;
        }
    }

    public function isUser($email){
        $this->db->where('email', $email);
        return $this->db->get('users')->row();
    }

    public function isUserActive($email){
        $this->db->where(array('email' => $email, 'active' => 1));
        return $this->db->get('users')->row();
    }


    /*
     * Insert
     */

    public function register($password_hash, $activation_code){
        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'password' => $password_hash,
            'activation_code' => $activation_code,
            'creation_date' => time()
        );
        return $this->db->insert('users',$data);
    }


    /*
     * Update
     */

    public function activeUser($email, $activation_code){

        $this->db->where('email', $email);
        $query = $this->db->get('users')->row();
        if($query->activation_code == $activation_code){
            $this->db->set('active', 1);
            $this->db->set('activation_code', NULL);
            $this->db->where(array('email' => $email, 'activation_code' => $activation_code));
            return $this->db->update('users');
        }else{
            return false;
        }

    }


    /*
     * Others
     */

    public function sendEmailActivation($email, $activationcode){
        $from = "ts3adresim@gmail.com";
        $subject = 'ALKÜ Personel İzin Takip Sistemi - Aktivasyon Kodu';

        $message = 'Hesabınızı aktif etmek için lütfen aşağıdaki linke tıklayınız.<br><br>
        <a href="'.base_url().'users/activation?email='.$email.'&code='.$activationcode.'" target="_blank">
        <b>Aktivasyonu Onayla</b></a><br>';

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'holidaytest07';  //sender's password
        $config['mailtype'] = 'html';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from($from, 'Teamspeak Adresim');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        return $this->email->send();
    }

}