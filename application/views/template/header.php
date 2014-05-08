<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to Online Reservation System</title>  

        <script src="<?php echo base_url() . "contents/scripts/bootstrap-datepicker.js"; ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/datepicker.css"; ?>"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/datepicker.less"; ?>"> 
        <script src="<?php echo base_url() . "contents/scripts/popup.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/test.css"; ?>"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/pop-up-booking.css"; ?>"> 
        <link rel="shortcut icon" href="<?php echo base_url() . "contents/images/favicon1.jpg"; ?>" type="image/x-icon"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/dashboardStyle.css"; ?>"> 
        <link rel="stylesheet" href="<?php echo base_url() . "contents/styles/jquery.tinytooltip.css"; ?>">
        <script src="<?php echo base_url() . "contents/scripts/jquery.tinytooltip.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery.tinytooltip.min.js"; ?>"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . "contents/styles/styles.css"; ?>"/>
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

        <script src="<?php echo base_url() . "contents/scripts/apiCheckin.js"; ?>"></script>
    </head>
    <body>


        <div id="header">





            <div id="headerLogo">

                <img src="<?php echo base_url() . "contents/images/ParkReserve.png"; ?>"/>

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
                        <li><a href="<?Php echo base_url() . 'index.php/dashboard/addNewRoomForm' ?>">DEVELOPER TOOLS</a></li>
                        <li><a id="loginLink" href="<?Php echo base_url() . 'index.php/login/logout' ?>">LOG OUT</a></li>
                    </ul> 
                <?php }
                ?>






            </div>


        </div>




