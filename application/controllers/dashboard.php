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
             $this->load->view('dashboard/hotelSelectionToAddRoom', $data);
            //$this->load->view("dashboard/addNewRoom");        
           
             $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
                    
  }
        
  public function get_user_hotel_id(){
      if ($this->session->userdata('logged_in')) {
              
           $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $id){
          $user_id=$id->id;
      }
      $data['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      
      
      
   if(isset($_POST['id']))
$hotel_id= $_POST['id'];



$this->load->view('dashboard/hotelSelectionToAddRoom', $data);
 $this->load->view("dashboard/addNewRoom");      
//die($a);
      }
      else {
          echo 'User not logged in';    
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
             $this->load->view('dashboard/hotelSelectionToAddRoom', $data);
             $this->load->view("dashboard/addNewRoom");        
           
             $this->load->view('template/footer');
             
             }  
        else {
            redirect('login', 'refresh');
        }
    }
    
    
        
                
        function addRoom(){
       if ($this->session->userdata('logged_in')) {
            $data['username'] = Array($this->session->userdata('logged_in'));    
        $this->load->library('upload');
           
  
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
     
    
     public function bookingInfo()
    {
         $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('dashboard/bookingInfo');
       
        $this->load->view('template/footer');
        
    }
        
}
        
        