<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard extends CI_Controller {

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
         if ($this->session->userdata('logged_in')) {
              
           $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $id){
          $user_id=$id->id;
      }
      $data['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      
             $this->load->view('template/header');
             $this->load->view("dashboard/reservationSystem");
             
            $this->load->view("dashboard/addNewRoom", $data);        
           
             $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
                    
  }
        
 
        
          function addNewRoomForm()
    {
          if ($this->session->userdata('logged_in')) {
              
           $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $id){
          $user_id=$id->id;
      }
      
      $data['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      
             $this->load->view('template/header');
             $this->load->view("dashboard/reservationSystem");
             
             $this->load->view("dashboard/addNewRoom", $data);        
           
             $this->load->view('template/footer');
             
             }  
        else {
            redirect('login', 'refresh');
        }
    }
    
    
        
                
        function addRoom(){
       if ($this->session->userdata('logged_in')) {
   $username = $this->session->userdata('username');
        $this->load->library('upload');
         
  if(($_SERVER['REQUEST_METHOD'] == 'POST'))
            {
                $hotel_id = $_POST['selectHotel'];
                
            }
        if (!empty($_FILES['room_img']['name']))
        {
            // Specify configuration for File 1
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
                
 
            // Initialize config for File 1
            $this->upload->initialize($config);
 
            // Upload file 1
            if ($this->upload->do_upload('room_img'))
            {
                $data = $this->upload->data();
                $img_name =   $data['file_name']; 
            }
            else
            {
                echo $this->upload->display_errors();
            }
        }
         
              // $this->session->set_flashdata('mess', 'Fill up the required field');
         
       
        elseif(empty($img_name))
        {
            $img_name="";
        }
        
       
            $room_type = $this->input->post('room_type');
           $noOfRoom = $this->input->post('noOfRoom');
           $price = $this->input->post('price');
           $description = $this->input->post('description');
        
           $this->addNewRoomEmail($username, $hotel_id);
            $data['add_room']= $this->dashboard_model->add_new_room($room_type,$noOfRoom,$price,$description,$img_name, $hotel_id);
            
           if($data)
           {
               $this->session->set_flashdata('message', 'Data sucessfully Added');
           }
         
            
           
            $this->load->library('session');
     
       $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem',$data);
        $this->load->view('dashboard/roomInformation',$data);
      
        $this->load->view('template/footer');
        
        redirect('dashboard/roomInfo', 'refresh');
        }
      else {
            redirect('login', 'refresh');
        }
        }
        
      public function addNewRoomEmail($username, $hotel_id){
              $data['user']= $this->dbmodel->get_current_user($username);
    $data['hotel']= $this->dbmodel->get_current_hotel_by_id($hotel_id);
   $uri = 'http://'. $_SERVER['HTTP_HOST'] ;
   $subject = "Registration Successful";
   $message =  $this->load->view('emailTemplates/emailHeader');
   $message .= $this->load->view('emailTemplates/roomAddition', $data);
   $message .=  $this->load->view('emailTemplates/emailFooter');
   $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: admin<info@smartaservices.com>' . "\r\n" ."CC: info@salyani.com.np";

   
   $retval = mail ($username,$subject,$message,$headers);
   if( $retval == true )  
   {
      echo "Email sent successfully...";
   }
   else
   {
       $mess = "Message could not be sent...";
       die($mess) ;
   }    
 }  
        
        
        
          
        public function get_hotel_id(){
   if(isset($_POST['id'])){
$hotel_id= $_POST['id'];
   }
   else
   {
       $hotel_id='0';
   }
$data['query']= $this->dashboard_model->booking_room($hotel_id);



 $this->load->view('dashboard/roomInformation',$data);
//die($a);
    
}
                
        
public function roomInfo()
        {
            if ($this->session->userdata('logged_in')) {
                
        $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $id){
          $user_id=$id->id;
      }
      $data['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      
         $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('dashboard/hotelSelection', $data);
        $this->load->view('dashboard/roomInformation');
      
        $this->load->view('template/footer');
       
        }  
        else {
            redirect('login', 'refresh');
        }
        }
        
         function edit($id)
        {
             if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
              $data['query'] = $this->dashboard_model->findroom($id);
               
              
            //die($data['query']);
            $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem',$data);
        $this->load->view('dashboard/editRoomInfo',$data);
       
        $this->load->view('template/footer',$data);
        
        }  
        else {
            redirect('login', 'refresh');
        }
        }
        
        function update()
        {
             if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
        $this->load->library('upload');
 
        if (!empty($_FILES['room_img']['name']))
        {
            
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
                
 
            
            $this->upload->initialize($config);
 
            
            if ($this->upload->do_upload('room_img'))
            {
                $data = $this->upload->data();
                $img_name =   $data['file_name']; 
                
               
            }
            else
            {
                echo $this->upload->display_errors();
            }
 
        }
        if(empty($img_name))
        {
            echo "";
        }
        
       $id = $this->input->post('id');
           $room_type = $this->input->post('room_type');
           $noOfRoom = $this->input->post('noOfRoom');
           $price = $this->input->post('price');
           $description = $this->input->post('description');
        
               
                
           
            $data['add_room']= $this->dashboard_model->updateRoom($id,$room_type,$noOfRoom,$price,$description,$img_name);
           
           if($data)
           {
               $this->session->set_flashdata('message', 'Data sucessfully Added');
           }
           else
           {
               $this->session->set_flashdata('mess', 'Fill up the required field');
           }
            
           
            $this->load->library('session');
     
              
            redirect('dashboard/roomInfo','refresh');
            }  
        else {
            redirect('login', 'refresh');
        }
        }
        
        
           public function delete($id) {
        if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));
            $this->dashboard_model->deleteRoom($id);
            $this->session->set_flashdata('message', 'Data Deleted Sucessfully');
           redirect('dashboard/roomInfo','refresh');
           }  
        else {
            redirect('login', 'refresh');
        }
        
    }
    
    public function calender()
    {
         $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('dashboard/calender');
       
        $this->load->view('template/footer');
        
    }
     
    public function get_hotel_id_for_booked_room(){
   if(isset($_POST['id'])){
$hotel_id= $_POST['id'];
   }
   else
   {
       $hotel_id='0';
   }
$room= $this->dbmodel->room_info($hotel_id);
foreach ($room as $a){
    $room_id=$a->id;
}

$data['personalInfo'] =  $this->dbmodel->get_booking_person_info($room_id);
foreach ($data['personalInfo'] as $b){
    $person_id=$b->Id;
}
if(isset($person_id)){
$data['roomInfo'] =  $this->dbmodel->get_booked_room_info($person_id);


 $this->load->view('reservationInformation/bookedRoomInformation', $data);
//die($a);
}
 else {
    echo '<h3>No rooms are booked</h3>';    
}
    
}
     public function bookingInfo()
    {
            if ($this->session->userdata('logged_in')) {
                
        $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $id){
          $user_id=$id->id;
      }
      $data['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      
         $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('reservationInformation/bookedRoomView', $data);
        $this->load->view('reservationInformation/bookedRoomInformation');
      
        $this->load->view('template/footer');
       
        }  
        else {
            redirect('login', 'refresh');
        }
        }
        
}
        
        