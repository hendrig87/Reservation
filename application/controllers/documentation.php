<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentation extends CI_Controller {

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
                  
        $this->load->view('template/header');
        $this->load->view("dashboard/reservationSystem");
        $this->load->view('documentations/document');    
        $this->load->view('template/footer');      
            
  }
  
   public function download(){
$this->load->helper('my_download_helper');

      $filename= $_GET['download'];
    
 $data = file_get_contents(base_url()."/contents/".$filename); // Read the file's contents
$name = $filename;

force_download($name, $data);      


exit;
        $this->load->view('template/header');
        $this->load->view("dashboard/reservationSystem");
        $this->load->view('documentations/document'); 
        $this->load->view('template/footer');
        
  }
  
  
  
  
}