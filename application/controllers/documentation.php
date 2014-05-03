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
        $this->load->view('documentations/documentationNavigation');
        $this->load->view('documentations/document');
        
        $this->load->view('template/footer');
        $this->load->view('template/payment');
        
            
  }
  
   public function download(){
$this->load->helper('download');

      $filename= $_GET['download'];
 $data = file_get_contents("./contents/scripts/".$filename); // Read the file's contents
$name = $filename;

force_download($name, $data);      


exit;
        
  }
  
  
  
  
}