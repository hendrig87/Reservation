<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cancel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
      //  $this->load->model('dbmodel');
      //   $this->load->model('api_model');
        $this->load->model('dashboard_model');
       // $this->load->model('booking_room');
       // $this->load->helper('url');

        $this->load->helper(array('form', 'url'));
     //   $this->load->library("pagination");
    }

    function getRandomStringForVerification($length) {
        $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZabcdefghijklmnopqrstuvwxyz123456789";
        $validCharNumber = strlen($validCharacters);
        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }
    
    public function index()
    {
         $this->load->view('cancelBooking/firstView');
    }
    
    public function postBooking()
    {
        if(isset($_POST['bookingId']))
        {
            $bookId = $_POST['bookingId'];
        }
        
         if(isset($_POST['email']))
        {
            $email = $_POST['email'];
        }
        
        $user = $this->dashboard_model->get_user_verified($bookId, $email);
       
        if(!empty($user))
        {
            foreach ($user as $users)
            {
                $userName = $users->full_name;
                $userEmail = $users->email;
            }
            $key = $this->getRandomStringForVerification(10);
            
            $this->dashboard_model->add_verification_code($userName, $userEmail, $key);
            
             $this->verificationEmail($userName, $userEmail, $key);
            $this->load->view('cancelBooking/secondView');
        }
        else
        {
            echo "<h3>Sorry! email or booking id did not match.";
        }
        
    }
    
     public function verificationEmail($userName, $userEmail, $key) {
        $this->load->helper('send_email_helper');
        $subject = "Verification Code";
        $imglink = base_url() . "contents/images/ParkReserve.png";
        $message = cancel_email($userName, $imglink, $key);

        send_verification_code($userEmail, $subject, $message);
    }
    
    public function cancelBooking()
    {
        if(isset($_POST['code']))
        {
            $code = $_POST['code'];
        }
        
         $user = $this->dashboard_model->get_user_verified_by_verification_code($code);
       
        if(!empty($user))
        {
            foreach ($user as $users)
            {
                $userName = $users->full_name;
                $userEmail = $users->email;
            }
             $this->cancellationEmail($userName, $userEmail);
            //$this->load->view('cancelBooking/secondView');
        }
        else
        {
            echo "<h3>Sorry! email or booking id did not match.";
        }
           
    }
    
     public function cancellationEmail($userName, $userEmail) {
        $this->load->helper('send_email_helper');
        $subject = "Booking Cancelled";
        $imglink = base_url() . "contents/images/ParkReserve.png";
        $message = cancel_notification_email($userName, $imglink);

        send_cancellation_email($userEmail, $subject, $message);
    }
    
    
    
    
    
}