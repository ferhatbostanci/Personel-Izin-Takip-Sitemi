<?php

function sumWorkDayYearly($staffid, $year, $worker){
    $CI = get_instance();
    $CI->load->model('staff_model');
    $CI->load->helper('workdays');

    $counter = 0;
    $yearlydata = $CI->staff_model->getDetailLeaveHistoryByIDAndYear($staffid, $year);

    foreach($yearlydata as $data){
        $counter += getWorkdays($data['start_date'], $data['end_date'], $worker);
    }

    return $counter;


}