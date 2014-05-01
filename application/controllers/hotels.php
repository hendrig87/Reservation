<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotels extends CI_Controller {

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
 
  public function addNewHotel(){
      if ($this->session->userdata('logged_in')) {
       $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $data){
          $user_id=$data->id;
      }
       $this->load->library('form_validation');
       
                $this->form_validation->set_rules('hotelName', 'Name of Hotel', 'trim|required|xss_clean');
                $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|xss_clean');
                
                if($this->form_validation->run() == FALSE)
                     {
                        $this->index();
                     }
                else
                {  
                    $hotel_name= $this->input->post('hotelName');
                    $address= $this->input->post('address');
                    $contact= $this->input->post('contact');
                   $this->dbmodel->add_new_hotel($hotel_name, $address, $contact, $user_id);

                    
                    $this->session->set_flashdata('message', 'One hotel added sucessfully');
                    redirect('hotels/index'); 
                    
                    
                }
      
      
      
      
  }
 else {
       redirect('login', 'refresh');
  }
 
}


public function hotelListing(){
    
    if ($this->session->userdata('logged_in')) {
       $username = $this->session->userdata('username'); 
      $user=  $this->dbmodel->get_user_info($username);
      foreach ($user as $data){
          $user_id=$data->id;
      }
      $dat['hotelName']=$this->dbmodel->get_user_hotel($user_id);
      $this->load->view('hotel/hotelListing', $dat);
       
    }
 else {
          echo 'couldnot find any hotel';    
      }   
   }

   public function showhotel(){    
      
}

public function get_hotel_id(){
   // if(isset($_POST['hotel_id']));
$a['id']= $_POST['hotel_id'];
die($a);
     //$this->load->view('hotel/hotelListing', $a);
}










}
