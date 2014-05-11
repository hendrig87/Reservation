<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_booking extends CI_Controller {

    function __construct() {
     parent::__construct();  
        $this->load->library('session');
        $this->load->model('dbmodel');
        $this->load->model('dashboard_model');
         $this->load->model('booking_room');
        $this->load->helper('url');
       
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }
	
	public function index(){ 
            
            $this->load->view('template/header');
            $this->load->view('template/imageDiv');
           
            $this->load->view('template/reservation_template');
            $this->load->view('login/test');
            $this->load->view('template/footer');

        }
        
           
        
        function post_action()
        {   
             $this->load->helper('availableRoom');
             
            $data['abc']=array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adult'],
            'child' => $_POST['child']
                    );
            
            $hotelId= $_POST['hotelId'];
            
            $data['query']= $this->dashboard_model->booking_room($hotelId);
            
              $data['json'] = json_encode($data['query']);
              if(!$_POST['checkin'] && !$_POST['checkout'])
              {
                  $this->load->view('ReservationInformation/room_booking_empty_view');
              }
              else
              {            
            $this->load->view('ReservationInformation/room_booking',$data);
              }
            
          
        }
        
        
        function book_now()
        {  
                $hotelId= $_POST['hotelId'];
           $data['query']= $this->dashboard_model->booking_room($hotelId);
           //echo $data['query'];
            $j_son['json'] = json_encode($data);
          // echo $j_son;
          
          $this->load->view('ReservationInformation/PersonalInfo',$j_son);
            
          
        }
        
         function personal_info()
        {  
              $hotelId= $_POST['hotelId'];
            $totalPrice = $_POST['total_price'];
            $fullName = $_POST['fullnames'];
            $address = $_POST['addresss'];
            $occupation = $_POST['occupations'];
            $nationality = $_POST['nationalitys'];
            $contactNo = $_POST['contactnos'];
            $email = $_POST['emails'];
            $remarks = $_POST['remarkss'];
            
            
             $check_in = $_POST['checkin'];
            $check_out = $_POST['checkout'];
            $adult_s = $_POST['adult'];
            $child_s = $_POST['child'];
           // die($fullName);
          //die($check_in);
   
            $data['personalInfo']=$this->booking_room->personal_info($fullName,$address,$occupation,$nationality,$contactNo,$email,$remarks,$totalPrice,$child_s,$adult_s);
         
            $jsondatas = $_POST['updated_json'];
            
            $jsonDecode = json_decode($jsondatas,true);
            $jsonArray = $jsonDecode;
     
            array_walk($jsonArray, function (&$subarray) use ($check_in) {
            $subarray['check_in_date'] = $check_in;
            });

            array_walk($jsonArray, function (&$subarray) use ($check_out) {
            $subarray['check_out_date'] = $check_out;
            });


               foreach ($jsonArray as $item)
               {
                if($item['no_of_room'] != "0")
                {
                    mysql_query("INSERT INTO `booking_info` (check_in_date, check_out_date, room_type, no_of_rooms_booked) 
       VALUES ('".$item['check_in_date']."', '".$item['check_out_date']."' ,'".$item['room_name']."', '".$item['no_of_room']."')");
                    
                    $this->bookingEmail($hotelId, $totalPrice, $fullName, $email, $check_in, $check_out, $child_s, $adult_s);
                }
     
               }
               
               
              // $stack = array("orange", "banana");
                //array_push($stack, "apple", "raspberry");

          $this->load->view('ReservationInformation/payment', $hotelId,$totalPrice);
            
        }
        
        
        
    public function bookingEmail($hotelId, $totalPrice, $fullName, $email, $check_in, $check_out, $child_s, $adult_s){ 
   
      $hotel=  $this->dbmodel->get_current_hotel_by_id($hotelId);      
       if (!empty($hotel)) {
        foreach ($hotel as $data) {
            $hotelname = $data->name;
        }
    }
             
   $this->load->helper('send_email_helper');
   $subject = "Room Booking Successful";
   $imglink = base_url() . "contents/images/ParkReserve.png";
   $message = room_book_email($hotelname, $totalPrice, $fullName, $check_in, $check_out, $child_s, $adult_s, $imglink);   
   
    
    send_room_book_email($email,$subject,$message);      
 }
        
        function payment_options()
        {  
              $hotelId= $_POST['hotelId'];
              
          
          $this->load->view('ReservationInformation/thankYouNote', $hotelId);
            
          
        }
        
  }
        
