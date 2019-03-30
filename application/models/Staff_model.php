<?php

class Staff_model extends CI_Model {

    /*
     * GET
     */

    public function isStaff($id){
        $this->db->where('id', $id);
        return $this->db->get('staff')->row();
    }

    public function getActiveStaffList(){
        $this->db->where('active', 1);
        $result = $this->db->get('staff')->result();
        return json_decode(json_encode($result), 1);
    }

    public function getActiveStaffNumber(){
        $this->db->where('active', 1);
        return $this->db->get('staff')->num_rows();
    }

    /*
     * Insert
     */

    public function addStaff($name, $surname, $title){
        $data = array(
            'name' => $name,
            'surname' => $surname,
            'title' => $title,
            'creation_date' => time()
        );
        return $this->db->insert('staff', $data);
    }

}