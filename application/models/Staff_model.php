<?php

class Staff_model extends CI_Model {

    /*
     * GET
     */

    public function isStaff($id){
        $this->db->where('id', $id);
        return $this->db->get('staff')->row();
    }

    public function getStaffList(){
        $result = $this->db->get('staff')->result();
        return json_decode(json_encode($result), 1);
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

    public function getLeaveTypes(){
        $result = $this->db->get('leave_types')->result();
        return json_decode(json_encode($result), 1);
    }

    public function getDetailLeaveHistory(){
        $result = $this->db->get('detail_leave_history')->result();
        return json_decode(json_encode($result), 1);
    }

    public function getActiveLeaveHistoryNumber(){
        $this->db->where('end_date >=', date('Y-m-d', time()));
        return $this->db->get('leave_history')->num_rows();
    }

    public function getTodayJobNumber(){
        $midnight = strtotime('today midnight');
        $this->db->where('registration_date >=', $midnight);
        $leavehistory = $this->db->get('leave_history')->num_rows();
        $this->db->where('creation_date >=', $midnight);
        $staff = $this->db->get('staff')->num_rows();
        return $leavehistory + $staff;
    }

    public function getWeekJobNumber(){
        $week = strtotime(date('Y/m/d', strtotime('-1 week')));
        $this->db->where('registration_date >=', $week);
        $leavehistory = $this->db->get('leave_history')->num_rows();
        $this->db->where('creation_date >=', $week);
        $staff = $this->db->get('staff')->num_rows();
        return $leavehistory + $staff;
    }

    /*
     * Insert
     */

    public function addStaff($name, $surname, $title, $tenyear){
        if(empty($title)){
            $title = NULL;
            $tenyear = NULL;
        }
        if(!empty($title) && isset($tenyear)) $tenyear = 1;
        if(!empty($title) && !isset($tenyear)) $tenyear = 0;
        $data = array(
            'name' => $name,
            'surname' => $surname,
            'title' => $title,
            'ten_year' => $tenyear,
            'creation_date' => time()
        );
        return $this->db->insert('staff', $data);
    }

    public function addLeaveHistory($staffid, $userid, $startdate, $enddate, $leavetype){
        $data = array(
            'staff_id' => $staffid,
            'user_id' => $userid,
            'start_date' => $startdate,
            'end_date' => $enddate,
            'leave_type' => $leavetype,
            'registration_date' => time()
        );
        return $this->db->insert('leave_history', $data);
    }


    /*
     * Update
     */

    public function updateStaff($id, $name, $surname, $title, $tenyear){
        if(empty($title)){
            $title = NULL;
            $tenyear = NULL;
        }
        if(!empty($title) && isset($tenyear)) $tenyear = 1;
        if(!empty($title) && !isset($tenyear)) $tenyear = 0;
        $this->db->set('name', $name);
        $this->db->set('surname', $surname);
        $this->db->set('title', $title);
        $this->db->set('ten_year', $tenyear);
        $this->db->where('id', $id);
        return $this->db->update('staff');
    }

    public function changeStaffActive($id, $status){
        $this->db->set('active', $status);
        $this->db->where('id', $id);
        return $this->db->update('staff');
    }

}