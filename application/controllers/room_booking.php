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
             $this->load->helper('availableroom');
             
            $data['abc']=array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adult'],
            'child' => $_POST['child'],
            'hotelId'=> $_POST['hotelId'],
                    );
           
            $hotel= $_POST['hotelId'];
          
            $hotels= $this->dashboard_model->get_hotel_id($hotel);
            if(!empty($hotels)){
            foreach ($hotels as $hotelData)
            {
                $hotelId = $hotelData->id;
            }}
            else{
                $hotelId= 4;
            }
            
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
         $hotel= $_POST['hotelId'];
            $data['hotels']= $this->dashboard_model->get_hotel_id($hotel);
            if(!empty($data['hotels'])){
            foreach ($data['hotels'] as $hotelData)
            {
                $hotelId = $hotelData->id;
            }}
            else{
                $hotelId=4;
            }
          
           $data['query']= $this->dashboard_model->booking_room($hotelId);
           //echo $data['query'];
            $j_son['json'] = json_encode($data);
            
          
          $this->load->view('ReservationInformation/PersonalInfo',$j_son);
            
          
        }
                
        public function personal_info()
        {  
             
             if(isset($_POST['total_price'])){
             $totalPrice = $_POST['total_price'];}
             
             if(isset($_POST['fullnames'])){
             $fullName = $_POST['fullnames'];}
             
             if(isset($_POST['addresss'])){
             $address = $_POST['addresss'];}
             
             if(isset($_POST['occupations'])){
             $occupation = $_POST['occupations'];}
             
             if(isset($_POST['nationalitys'])){
             $nationality = $_POST['nationalitys'];}
             
             if(isset($_POST['contactnos'])){
             $contactNo = $_POST['contactnos'];}
             
             if(isset($_POST['emails'])){
             $email = $_POST['emails'];}
             
             if(isset($_POST['remarkss'])){
             $remarks = $_POST['remarkss'];}
            
            if(isset($_POST['checkin'])){
            $check_in = $_POST['checkin'];}
            
            if(isset($_POST['checkout'])){
            $check_out = $_POST['checkout'];}
            
            if(isset($_POST['adult'])){
            $adult_s = $_POST['adult'];}
            
            if(isset($_POST['child'])){
            $child_s = $_POST['child'];}
           
           $id=0;
            $bookingId = $this->booking_room->get_biiking_id();

            foreach ($bookingId as $bId) {
                $id = $bId->booking_id;
            }
            
            $id = $id + 1;
            $bookId = $id;
          $this->booking_room->personal_info($fullName,$address,$occupation,$nationality,$contactNo,$email,$remarks,$totalPrice,$child_s,$adult_s,$bookId);
          
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
                    mysql_query("INSERT INTO `booking_info` (check_in_date, check_out_date, room_type, no_of_rooms_booked, booking_id, hotel_id) 
       VALUES ('".$item['check_in_date']."', '".$item['check_out_date']."' ,'".$item['room_name']."', '".$item['no_of_room']."','".$bookId."','".$item['hotel_id']."' )");
               
                }
               }
              
$data['value']= array( $totalPrice);
          $this->load->view('ReservationInformation/payment', $data);
          
            
        }
       




       function bookingEmail($hotelId, $totalPrice, $fullName, $email, $check_in, $check_out, $child_s, $adult_s){ 
   
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
              $fullName= $_POST['fullName'];
              $cardNumber = $_POST['cardNumber'];
              $securityNumber = $_POST['securityNumber'];
           
         
          
          $this->load->view('ReservationInformation/thankYouNote');
            
          
        }
        
  }
        
