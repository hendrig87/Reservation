<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <title>Welcome to Online Reservation System</title>       
        <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>    
        <script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/tableStyles.css"; ?>"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/pop-up-booking.css"; ?>"> 
        <link rel="shortcut icon" href="<?php echo base_url() . "contents/images/favicon1.jpg"; ?>" type="image/x-icon"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/dashboardStyle.css"; ?>">        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . "contents/styles/styles.css"; ?>"/>    

        <script>
      
            $(document).ready(function() {
                
                // add or substract number of room.
                 $("#adds").on("click",function(){
                   
                    var a = $("#noOfRoom").val();

                    a++;
                     if (a=>1) {
                         $("#subs").removeAttr("disabled");
                    }
                    $("#noOfRoom").val(a); 
                 });
       
                $("#subs").on("click",function(){
                            var b = $("#noOfRoom").val();
                    if (b<=1) {
                        $("#subs").attr("disabled","disabled");
                    }
                    b--;
                    $("#noOfRoom").val(b);
                });
                
          // add or substract number of room.      
                

                var time = 2000,
                        timer;

                function handlerIn() {
                    clearTimeout(timer);
                    $('#loginOnHover').stop(true).css('opacity', 1).show();
                }

                function handlerOut() {
                    timer = setTimeout(function() {
                        $('#loginOnHover').fadeOut(100);
                    }, time);
                }
                $("#loggin, #loginOnHover").hover(handlerIn, handlerOut);
                function myPicker() {
                    $("#datepicker2").datepicker({dateFormat: "yy-mm-dd"});
                }
                function mpicker() {
                    $("#datepicker1").datepicker({dateFormat: "yy-mm-dd"});
                }


            });
        </script>
<script>
    $(function () {

    $('.navigationTop ul li').click(function () {
  $("li").removeClass("active");
  $(this).addClass("active");
});

});
    
    $(document).ready(function(){
  $("#menuImage").click(function(){
      $("#left").toggle();   
  });
});
    </script>
        <script src="<?php echo base_url() . "contents/scripts/apiCheckin.js"; ?>"></script>
        <style>
           progress {
               margin: 20% auto auto 25%;
  color: #0063a6;
  font-size: .6em;
  line-height: 1.5em;
  text-indent: .5em;
  width: 80em;
  height: 5em;
  border: 1px solid #0063a6;
  background: #fff;
}
        </style>
    </head>
    <body >
<div id="full">
        <div id="header" >



<div id="menuImage">
         <img src="<?php echo base_url() . "contents/images/menuiconnext.jpg"; ?>" alt=""/>
    </div>

            <div id="headerLogo">

                <img src="<?php echo base_url() . "contents/images/ParkReserve.png"; ?>" alt="Reservation"/>

            </div>
            <div class="navigationTop">
                <?php if (!$this->session->userdata('logged_in')) { ?>
                    <ul>
                        <li><a href="<?Php echo base_url() . 'index.php' ?>">HOME</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/documentation/index' ?>">DOCUMENTATION</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/login/loginForm' ?>">DEVELOPER TOOLS</a></li>
                        <li id="log_in"><a href="<?Php echo base_url() . 'index.php/login/registrationForm' ?>" >SIGN UP</a></li>
                        <li id="loggin" ><a  href="<?Php echo base_url() . 'index.php/login/loginForm' ?>">LOGIN</a></li>
                    </ul>

                    <?php } else { ?>

                    <ul>
                        <li><a href="<?Php echo base_url() . 'index.php' ?>">HOME</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/documentation/index' ?>">DOCUMENTATION</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/dashboard/bookingInfo' ?>">DEVELOPER TOOLS</a></li>
                        <li><a id="loginLink" href="<?Php echo base_url() . 'index.php/login/logout' ?>">LOG OUT</a></li>
                    </ul> 
                <?php }  ?>

            </div>


        </div>




