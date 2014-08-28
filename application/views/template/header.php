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
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . "contents/styles/reservation_style.css"; ?>"/>
        <link rel="stylesheet" href="/resources/demos/style.css" />

        <script>


            $(document).ready(function() {

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
    </head>
    <body>

<div id="full">
        <div id="header">



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

                    <?php
                } else {
                    ?>
                    <script src="<?php echo base_url() . "contents/scripts/dashboard.js"; ?>"></script>


                    <ul>
                        <li><a href="<?Php echo base_url() . 'index.php' ?>">HOME</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/documentation/index' ?>">DOCUMENTATION</a></li>
                        <li><a href="<?Php echo base_url() . 'index.php/dashboard/bookingInfo' ?>">DEVELOPER TOOLS</a></li>
                        <li><a id="loginLink" href="<?Php echo base_url() . 'index.php/login/logout' ?>">LOG OUT</a></li>
                    </ul> 
                <?php }
                ?>






            </div>


        </div>




