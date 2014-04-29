<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_booking extends CI_Controller {

    function __construct() {
     parent::__construct();  
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }
	
	public function index(){ 
             $checkin="jsdlfj";
                    //$_POST['checkin'];
            $checkout="ksdflj";
                    //$_POST['checkout'];
            $adult="sljdlf";
                    //$_POST['adults'];
            $child="lsdjfljs";
             $data['abc'] = array($checkin,$checkout ,$adult, $child);
            $this->load->view('template/header');
            $this->load->view('template/imageDiv');
            $this->load->view('template/reservation_template',$data);
            $this->load->view('login/test');
            $this->load->view('template/footer');

        }
        
        public function room_book()
        {
            
           $this->load->view('template/header');
            $this->load->view('template/imageDiv');
            $this->load->view('template/reservation_template');
            $this->load->view('login/test');
            $this->load->view('template/footer');

        }
           
        
        function post_action()
        {   
            $checkin=$_POST['checkin'];
            $checkout=$_POST['checkout'];
            $adult=$_POST['adult'];
            $child=$_POST['child'];
            $c=$_POST['ab'];
            
           $data['abc'] = array($checkin,$checkout ,$adult, $child,$c);
           var_dump($data);
           // $data['username'] = Array($this->session->userdata('logged_in'));
             //  $data['query']= $this->dashboard_model->booking_room();
            //die($data['query']);
         //$this->load->view('template/headerAfterLogin');
        //$this->load->view('dashboard/reservationSystem',$data);
       // $this->load->view('dashboard/roomInformation',$data);
      
       // $this->load->view('template/footer',$data);
        //$this->load->view('template/copyright',$data);
        
        
          
           
          
		
            $this->load->view('template/reservation_template',$data);
            
          
        }
  }
        
