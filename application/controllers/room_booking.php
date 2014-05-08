<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_booking extends CI_Controller {

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
            $checkIn = $_POST['checkin'];
            $firstDate = date('Y-m-d', strtotime($checkIn));
           
            $checkOut = $_POST['checkout'];
            $secondDate = date('Y-m-d', strtotime($checkOut));
            $hotelId= $_POST['hotelId'];
            
            $data['query']= $this->dashboard_model->booking_room($hotelId);
            
            //$data['total_room']= $this->dashboard_model->total_room();
            
           
                
              //  $data['availableRoom'] = $this->dashboard_model->availableRoom($firstDate,$secondDate);
            
            
           
            
            //$data['booked_room']= $this->dashboard_model->booked_room();
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
          
              $mydata = $_POST['child'];
      
     
              echo $mydata;
              
              $d='{"id":"75","room_name":"Economy ","no_of_room":"0","price":"500","description":"asdfasf","image":"","hotel_id":"1"},{"id":"70","room_name":"Couple Room","no_of_room":"0","price":"500","description":"sadsadasdas","image":"DSCF363.jpg","hotel_id":"1"},{"id":"66","room_name":"Luxury","no_of_room":"9","price":"1000","description":"dfh dvsrtruub dsgd","image":"arrow.jpg","hotel_id":"1"},{"id":"65","room_name":"Deluxe","no_of_room":"0","price":"800","description":"rybsvssfd","image":"2P2Z4.png","hotel_id":"1"}';
                $json = json_decode($d,TRUE);
                var_dump($json);
          $this->load->view('ReservationInformation/payment', $hotelId);
            
          
        }
        
        function payment_options()
        {  
              $hotelId= $_POST['hotelId'];
              
          
          $this->load->view('ReservationInformation/thankYouNote', $hotelId);
            
          
        }
        
  }
        
