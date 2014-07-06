<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotels extends CI_Controller {

 function __construct()
 {
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
            //$data['username'] = Array($this->session->userdata('logged_in'));
        $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('hotel/addNewHotel');
        
        $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
                    
  }
  public function addHotel(){
       if ($this->session->userdata('logged_in')) {
        $this->load->view('template/header');
        $this->load->view('dashboard/reservationSystem');
        $this->load->view('hotel/addNewHotel');
        $this->load->view('template/footer');
        
        }  
        else {
            
            redirect('login', 'refresh');
        }
  }
 
  public function addNewHotel(){
      if ($this->session->userdata('logged_in')) {
       $useremail = $this->session->userdata('useremail'); 
      $user=  $this->dbmodel->get_user_info($useremail);
      foreach ($user as $data){
          $user_id=$data->id;
      }
       $this->load->library('form_validation');
       
                $this->form_validation->set_rules('hotelName', 'Name of Hotel', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,35}$/]|required|xss_clean');
                $this->form_validation->set_rules('address', 'Address', 'trim|regex_match[/^[A-Za-z0-9\-\\,._ ]{2,35}$/]|required|xss_clean');
                $this->form_validation->set_rules('contact', 'Contact Number', 'trim|regex_match[/^[0-9]{9,15}$/]|required|xss_clean');
                
                if($this->form_validation->run() == FALSE)
                     {
                         $this->load->view('template/header');
                        $this->load->view('dashboard/reservationSystem');
                        $this->load->view('hotel/addNewHotel');
                        $this->load->view('template/footer');
                     }
                else
                {  
                    $hotel_name= $this->input->post('hotelName');
                    $address= $this->input->post('address');
                    $contact= $this->input->post('contact');
                    
                     $this->addHotelEmail($username, $hotel_name);
                   $this->dbmodel->add_new_hotel($hotel_name, $address, $contact, $user_id);

                    
                    $this->session->set_flashdata('message', 'One hotel added sucessfully');
                    redirect('hotels/index'); 
                    
                    
                }
      
      
      
      
  }
 else {
       redirect('login', 'refresh');
  }
 
}

 public function addHotelEmail($username, $hotel_name){
              $user= $this->dbmodel->get_current_user($username);
  
   if (!empty($user)) {
        foreach ($user as $data) {
            $username = $data->user_name;
            $useremail= $data->user_email;
}}
 
    $this->load->helper('send_email_helper');
   $subject = "Hotel Addition Successful";
   $imglink = base_url() . "contents/images/ParkReserve.png";
   $message = hotel_add_email($username,$imglink, $hotel_name);  
   
    
    send_hotel_add_email($useremail,$subject,$message);  
   
 }
 



public function hotelListing(){
    
    if ($this->session->userdata('logged_in')) {
   $useremail = $this->session->userdata('useremail');
            $user = $this->dbmodel->get_user_info($useremail);
            foreach ($user as $id) {
                $user_id = $id->id;
            }
            $data['hotelName'] = $this->dbmodel->get_user_hotel($user_id);   
      $this->load->view('template/header');
      $this->load->view('dashboard/reservationSystem');
      $this->load->view('hotel/hotelListing', $data);
      $this->load->view('template/footer');
    }
 else {
          redirect('login', 'refresh');   
      }   
   }

  











}
