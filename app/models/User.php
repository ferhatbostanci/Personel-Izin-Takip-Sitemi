<?php

class User {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function addUser($name, $surname, $email, $password, $activationcode){
        $this->db->query('INSERT INTO users (name, surname, email, password, activation_code, creation_date) VALUES (:name, :surname, :email, :password, :activation_code, :creation_date)');
        $this->db->bind(':name', $name);
        $this->db->bind(':surname', $surname);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':activation_code', $activationcode);
        $this->db->bind(':creation_date', time());
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Find user by nick
    public function findUserByEMail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function isUserActive($email){
        $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($row->active){
            return true;
        }else{
            return false;
        }
    }

    public function isUserCodeEquals($email, $code){
        $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($row->activation_code == $code){
            return true;
        }else{
            return false;
        }
    }


    /*
    * Update functions
    */

    public function userActivation($email){
        $this->db->query('UPDATE users SET active = :active, activation_code = :activation_code WHERE email = :email');
        $this->db->bind(':active', 1);
        $this->db->bind(':activation_code', NULL);
        $this->db->bind(':email', $email);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}