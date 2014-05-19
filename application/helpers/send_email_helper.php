<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function send_email($useremail,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($useremail, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        echo "Message could not be sent...";
         
   }    
   }

function register_email($user_name,$imglink)
{
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <img src="'.$imglink.'" alt="salyani" style="height:50px; width:50px; margin:10px;"/>

            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$user_name.'  !</h4>

    <h3>Welcome to reservation.</h3>
    <h4>You are almost done with the sign up process </h4>
    <p>Click <a href="#"> here</a> to confirm your account.</p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; Reservation</p>

            </div>

</div>';
    return $body;
    
}

function room_add_email($username,$imglink, $hotelname, $room_type)
{
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <img src="'.$imglink.'" alt="salyani" style="height:50px; width:50px; margin:10px;"/>

            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$username.'  !</h4>

  
    <h5>Congratulation your Room addition is successful</h5>
    <p>You have successfully added '.$room_type.' to your hotel '.$hotelname.' to reservation.</p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; Reservation</p>

            </div>

</div>';
    return $body;
}
function send_room_add_email($useremail,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($useremail, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        
        echo "Message could not be sent...";
         
   }    
   }
   
   function send_hotel_add_email($useremail,$subject,$message)
                {
    $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($useremail, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        
        echo "Message could not be sent...";
         
   }    
   }
   
   function hotel_add_email($username,$imglink, $hotel_name)
{
   
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <img src="'.$imglink.'" alt="salyani" style="height:50px; width:50px; margin:10px;"/>

            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$username.'  !</h4>

    <h4>Welcome to reservation.</h4>
    <h5>Congratulation your hotel addition is successful</h5>
    <p>You have successfully added your hotel  '.$hotel_name.' to reservation.</p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; Reservation</p>

            </div>

</div>';
    return $body;
}


function room_book_email($hotelname, $totalPrice, $fullName, $check_in, $check_out, $child_s, $adult_s, $imglink){
   $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <img src="'.$imglink.'" alt="salyani" style="height:50px; width:50px; margin:10px;"/>

            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$fullName.'  !</h4>

  
    <h5>Thank you for your booking through reservation.</h5>
    <p>You have successfully booked hotel '.$hotelname.' dated from '.$check_in.' to '.$check_out.' for '.$adult_s.' adults and '.$child_s.' for total price '.$totalPrice.'.</p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; Reservation</p>

            </div>

</div>';
    return $body; 
}

function send_room_book_email($email,$subject,$message)
                {
    $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
             
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        echo "Message could not be sent...";
         
   }  
   }
 
 