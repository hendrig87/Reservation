<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class calendar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
       
    }
    
    
     
    
    

function demo($year=NULL, $month=NULL)
{
    if ($this->session->userdata('logged_in')) {
            $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            
           
            
            
     if (!$year) {
$year = date('Y');
}
if (!$month) {
$month = date('m');
}  
 
        $data['mthBooking'] = $this->dashboard_model->get_booking_info_this_month($user_id, $year, $month);
        $data['mthEvents'] = $this->dashboard_model->get_event_info_this_month($year, $month);
        $data['months']= array($year, $month);
$this->load->helper('date_helper');

      $this->load->view('template/demo', $data);
}
     else {
            redirect('login', 'refresh');
        }
} 
    
    
    
}