<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotels extends CI_Controller {

 function __construct()
 {
   parent::__construct();  
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
      
 }
 
 public function index(){ 
          if ($this->session->userdata('logged_in')) {
            //$data['username'] = Array($this->session->userdata('logged_in'));
        $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('hotel/addNewHotel');
        
        $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
                    
  }
  public function addHotel(){
       if ($this->session->userdata('logged_in')) {
            //$data['username'] = Array($this->session->userdata('logged_in'));
        $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('hotel/addNewHotel');
        
        $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
  }
 
 
 
}