<?php

class Leave_model extends CI_Model {

    /*
     * Delete
     */

    public function deleteLeaveHistory($id){
        $this->db->where('id', $id);
        return $this->db->delete('leave_history');
    }

}