<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Online Reservation System</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()."contents/styles/styles.css";?>"/>
	
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <script>
            $(function() {
                $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });

            });
            $(function() {
                $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });
            });

        </script>


</head>
<body>
    <div id="topNavigationWithSlider">
          <div id="topNavigationDiv">

                <div id="topNavigation">
                    <div id="logoDiv">
                        <img src="<?php echo base_url() . "content/images/logo.png"; ?>"/>

                    </div>
                    <a href="#">HOME</a>
                    <a href="#explore">EXPLORE</a>
                    <a id="signup_link" href="#explore">SIGN UP</a>
                    <a id="loginLink" href="#explore">LOGIN</a>
                </div>


            </div>
            