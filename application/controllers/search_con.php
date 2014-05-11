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
       // die($userPart);
        
        $result = $this->searchdb->search($userPart) ;
      // $option = "";
       //  $startSelect = "<select id='link' >";
	//foreach ($result as $finaldata)
       // {
           //echo "<div id='link' onClick='addText(\"".$finaldata->name."\");'>" . $finaldata->name."</div>";
           
          // $option = $option." <option onClick='addText(\"".$finaldata->name."\");'>" . $finaldata->name."</option>"; 

       // }
	
	//$endSelect =  "</select>";
        
     //echo $startSelect.$option.$endSelect;
     $list = "";
     $startUL = " <style> #sugUL li:hover { background-color:#fofofo; } #link {
         position:relative; top:-20px; left:-40px;  } #link ul li {width:230px;} 
 </style> <div id='link' > <ul id='sugUL' style='list-style:none;'>";
     foreach ($result as $finaldata)
     {
         $list = $list."<li style='background-color:#ccc; padding:5px 20px 5px 0;' onClick='addText(\"".$finaldata->name."\");'> " . $finaldata->name." </li>";
     }
     $endUL = "</ul> </div>";
     
     echo $startUL.$list.$endUL;
 }      
 
 
}
 ?>