<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class popup extends CI_Controller {

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
            
            $this->load->view('template/header');
            $this->load->view('template/imageDiv');
            $this->load->view('template/reservation_template');
            $this->load->view('template/footer');

        }
        
           
       public function popinsert()
       {
           $a = $_POST['source1'];
           $b = $_POST['source2'];
           var_dump($a);
           
           $this->load->view('template/reservation_template',$a);
       }
  }
        
