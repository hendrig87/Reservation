<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function send_email($useremail,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' . "\r\n" ."CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n"."Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($useremail, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        
        $mess = "Message could not be sent...";
         
   }    
   }

function register_email($username,$imglink)
{
    $body = '<div style="width: 1000px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="height: 100px; alignment-adjust: central; background-color: #999; margin: 0 auto 0 auto;">
<img src="'.$imglink.'" alt="salyani" style="height:50px; width:50px; margin:10px;">
       
<div>
    
    
    <h4>Dear '.$username.'  !</h4>
<?php     } ?>
    <h4>Welcome to reservation.</h4>
    <h5>You are almost done with the sign up process </h5>
    <p>Click <a href="#"> here</a> to confirm your account.</p>
</div>



        </div>
<div>
    <p>&copy Reservation</p>
</div>
</div>';
    
}

