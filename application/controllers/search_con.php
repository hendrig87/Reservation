<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_con extends CI_Controller {
    
    function __construct()
 {
   parent::__construct();  
        $this->load->library('session');
         $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->model('searchdb');
      
 }
 function index()
 {
     $this->load->view('template/header');
 }
 
 public function user(){
     
        $userPart = $_POST['userA'];
        
        
        $result = $this->searchdb->search($userPart) ;
      
     $list = array();
  
     foreach ($result as $finaldata)
     {
         $data= $finaldata->name;
         array_push($list, $data);
        
     }
   
     echo json_encode($list);
   
 }      
 
 
}
 ?>