<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    function __construct()
 {
   parent::__construct();  
        $this->load->library('session');
         $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->model('dashboard_model');
        
      
 }
 
	public function index()
	{
      
             $this->load->library('session');
          
                $this->load->view('template/headerfirst');
                $this->load->view('login/loginOnHover');
                $this->load->view('template/imageDiv');
		$this->load->view('template/reservation_template');
                $this->load->view('template/footer');
          
       
	}
        public function mailSentMessage(){
                $this->load->view('template/header');
                $this->load->view('template/errorMessage');
                $this->load->view('template/imageDiv');
		$this->load->view('template/reservation_template');
                $this->load->view('template/footer');
              
        }
        
       
        
}
