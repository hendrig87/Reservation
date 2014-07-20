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
        die($userPart);
        die('here');
        
        $result = $this->searchdb->search($userPart) ;
       // die($result);
      // $option = "";
       //  $startSelect = "<select id='link' >";
	//foreach ($result as $finaldata)
       // {
           //echo "<div id='link' onClick='addText(\"".$finaldata->name."\");'>" . $finaldata->name."</div>";
           
          // $option = $option." <option onClick='addText(\"".$finaldata->name."\");'>" . $finaldata->name."</option>"; 

       // }
	
	//$endSelect =  "</select>";
        
     //echo $startSelect.$option.$endSelect;
     $list = array();
   //  $startUL = " <style> #sugUL li:hover { background-color:#fofofo; } #link {
  //       position:relative; top:-20px; left:-40px;  } #link ul li {width:230px;} 
 //</style> <div id='link' > <ul id='sugUL' style='list-style:none;'>";
     foreach ($result as $finaldata)
     {
         $data= $finaldata->name;
         array_push($list, $data);
        // $list = $list."<li style='background-color:#ccc; padding:5px 20px 5px 0;' onClick='addText(\"".$finaldata->name."\");'> " . $finaldata->name." </li>";
     }
    // $endUL = "</ul> </div>";
  // $json= str_replace(array('[', ']','"'), '', htmlspecialchars(json_encode($list), ENT_NOQUOTES));
   
     echo json_encode($list);
   // echo $json;
   //  echo $startUL.$list.$endUL;
 }      
 
 
}
 ?>