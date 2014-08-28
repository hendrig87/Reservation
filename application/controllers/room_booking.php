<?php
 header("Access-Control-Allow-Origin: *");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class room_booking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dbmodel');
         $this->load->model('api_model');
        $this->load->model('dashboard_model');
        $this->load->model('booking_room');
        $this->load->helper('url');

        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }

    public function index() {

        $this->load->view('template/header');
        $this->load->view('template/imageDiv');

        $this->load->view('template/reservation_template');
        $this->load->view('login/test');
        $this->load->view('template/footer');
    }

    function post_action() {
        $this->load->helper('availableroom');
        
        if($_POST)
        {
        $data['abc'] = array(
            'checkin' => $_POST['checkin'],
            'checkout' => $_POST['checkout'],
            'adult' => $_POST['adult'],
            'child' => $_POST['child'],
            'hotelId' => $_POST['hotelId'],
            'title'=>$_POST['title']
        );
        }
        $this->session->set_userdata($data['abc']);
        
      // echo $this->session->userdata('checkin');
       
        $hotel = $_POST['hotelId'];// form top it got hotel name
       
        $hotels = $this->dashboard_model->get_hotel_id($hotel);
        if (!empty($hotels)) {
            foreach ($hotels as $hotelData) {
                $hotelId = $hotelData->id;
            }
        } else
        {
            $hotelId = $_POST['hotelId'];
        }

        $data['query'] = $this->dashboard_model->booking_room($hotelId);
  
        $data['json'] = json_encode($data['query']);
       
        if (!$_POST['checkin'] && !$_POST['checkout']) {
            $this->load->view('ReservationInformation/room_booking_empty_view');
        } else {

            $this->load->view('ReservationInformation/room_booking', $data);
        }
    }

    function book_now() {
        $hotel = $this->session->userdata('hotelId');
       
        $j_son['abc'] = array(
            'hotelId' => $hotel,
            'title'=>$_POST['title']
        );
        $hotel = $this->session->userdata('hotelId');
        
        $data['hotels'] = $this->dashboard_model->get_hotel_id($hotel);
        if (!empty($data['hotels'])) {
            foreach ($data['hotels'] as $hotelData) {
                $hotelId = $hotelData->id;
            }
        } 
 else {
     $hotelId  = $hotel;
 }

        $data['query'] = $this->dashboard_model->booking_room($hotelId);
        
        $j_son['json'] = json_encode($data);


        $this->load->view('ReservationInformation/PersonalInfo', $j_son);
    }

    public function personal_info() {

        if (isset($_POST['total_price'])) {
            $totalPrice = $_POST['total_price'];
        }

        if (isset($_POST['fullnames'])) {
            $fullName = $_POST['fullnames'];
        }

        if (isset($_POST['addresss'])) {
            $address = $_POST['addresss'];
        }

        if (isset($_POST['occupations'])) {
            $occupation = $_POST['occupations'];
        }

        if (isset($_POST['nationalitys'])) {
            $nationality = $_POST['nationalitys'];
        }

        if (isset($_POST['contactnos'])) {
            $contactNo = $_POST['contactnos'];
        }

        if (isset($_POST['emails'])) {
            $email = $_POST['emails'];
        }

        if (isset($_POST['remarkss'])) {
            $remarks = $_POST['remarkss'];
        }

        if (isset($_POST['checkin'])) {
            $check_in = $_POST['checkin'];
        }

        if (isset($_POST['checkout'])) {
            $check_out = $_POST['checkout'];
        }

        if (isset($_POST['adult'])) {
            $adult_s = $_POST['adult'];
        }

        if (isset($_POST['child'])) {
            $child_s = $_POST['child'];
        }
        if (isset($_POST['hotelId'])) {
            $hotelId = $_POST['hotelId'];
        }
        if (isset($_POST['title'])) {
            $title = $_POST['title'];
        }
        $user = $this->dashboard_model->get_hotel_user($hotelId);
       if(!empty($user)){
        foreach ($user as $users){
            $userId = $users->user_id;
        }}
        $temp = $this->api_model->get_code_info($hotelId, $title);
        if(!empty($temp)){
        foreach ($temp as $tempo){
            $payment = $tempo->payment_info;
        }}
        else
        {
            $payment = "1";
        }

        $id = "0";
        $bookingId = $this->booking_room->get_biiking_id();

        foreach ($bookingId as $bId) {
            $id = $bId->booking_id;
        }

        $id = $id + 1;
        $bookId = $id;

        $data['personalDetail']= array(
            'fullname'=>$fullName,
            'address'=>$address,
            'occupation'=>$occupation,
            'nationality'=>$nationality,
            'contactno'=>$contactNo,
            'email'=>$email,
            'remark'=>$remarks,            
        );
        
        $this->session->set_userdata($data['personalDetail']);
      
        
        
      
        $this->booking_room->personal_info($fullName, $address, $occupation, $nationality, $contactNo, $email, $remarks, $totalPrice, $child_s, $adult_s, $bookId);

        $jsondatas = $_POST['updated_json'];
       
        $jsonDecode = json_decode($jsondatas, true);
        $jsonArray = $jsonDecode;
 
       
        array_walk($jsonArray, function (&$subarray) use ($check_in) {
            $subarray['check_in_date'] = $check_in;
        });

        array_walk($jsonArray, function (&$subarray) use ($check_out) {
            $subarray['check_out_date'] = $check_out;
        });


        foreach ($jsonArray as $item) {
            if ($item['no_of_room'] != "0") {
               // mysql_query("INSERT INTO `booking_info` (check_in_date, check_out_date, booking_id, hotel_id)
      // VALUES ('" . $item['check_in_date'] . "', '" . $item['check_out_date'] . "','" . $bookId . "','" . $item['hotel_id'] . "' )");
                 mysql_query("INSERT INTO `booked_room_info` (booking_id, room_type, no_of_rooms_booked, check_in_date, check_out_date)
       VALUES ('" . $bookId . "','" . $item['room_name'] . "', '" . $item['no_of_room'] . "','" . $item['check_in_date'] . "', '" . $item['check_out_date'] . "')");
            }
        }
        
                mysql_query("INSERT INTO `booking_info` (check_in_date, check_out_date, booking_id, hotel_id, status, user_id)
VALUES ('" . $item['check_in_date'] . "', '" . $item['check_out_date'] . "','" . $bookId . "','" . $item['hotel_id'] . "','0' , '" . $userId. "' )");
                
                $this->bookingEmail($hotelId, $totalPrice, $fullName, $email, $check_in, $check_out, $child_s, $adult_s, $bookId);
                
        $data['value'] = array($totalPrice);
        if ($payment == "0") {
            $this->load->view('ReservationInformation/payment', $data);
        } else {
            $this->load->view('ReservationInformation/paymentWithSkip', $data);
        }
    }

    function bookingEmail($hotelId, $totalPrice, $fullName, $email, $check_in, $check_out, $child_s, $adult_s, $bookId) {
      

        $this->load->helper('send_email_helper');
        $subject = "Room Booking Successful";
        $imglink = base_url() . "contents/images/ParkReserve.png";
        $message = room_book_email($hotelId, $totalPrice, $fullName, $check_in, $check_out, $child_s, $adult_s, $imglink, $bookId);


        send_room_book_email($email, $subject, $message);
    }

    function payment_options() {

//         $fullName= $_POST['fullName'];
//        $cardNumber = $_POST['cardNumber'];
//        $securityNumber = $_POST['securityNumber'];
//
//        $data['option'] = array(
//            'cardname'=>$fullName,
//            'cardnumber'=>$cardNumber,
//            'securitynumber'=>$securityNumber
//        );
//        
//        $this->session->set_userdata($data['option']);

        $this->load->view('ReservationInformation/thankYouNote');
    }
    
    function destroy_session()
    {
       // die($_POST['title']);
        $data['a']= array(
            'fullname'=>NULL,
            'address'=>NULL,
            'occupation'=>NULL,
            'nationality'=>NULL,
            'contactno'=>NULL,
            'email'=>NULL,
            'remark'=>NULL,
            'checkin' => NULL,
            'checkout' => NULL,
            'adult' => NULL,
            'child' => NULL,
            'hotelId' => NULL,
            'title'=>NULL
        );
        $this->session->unset_userdata($data['a']);
    }

}
