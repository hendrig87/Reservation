<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Online Reservation System</title>
        <script src="<?php echo base_url()."contents/scripts/jquery.js";?>"></script>
        
        <link rel="stylesheet" href="<?php echo base_url()."contents/styles/booking_style.css";?>"> 
        
        
        <link rel="shortcut icon" href="<?php echo base_url()."contents/images/favicon1.jpg";?>" type="image/x-icon"> 
        <link rel="stylesheet" href="<?php echo base_url()."contents/styles/dashboardStyle.css";?>"> 
        <link rel="stylesheet" href="<?php echo base_url()."contents/styles/jquery.tinytooltip.css";?>">
       
        
        <script src="<?php echo base_url()."contents/scripts/dashboard.js";?>"></script>
         <script src="<?php echo base_url()."contents/scripts/jquery.tinytooltip.js";?>"></script>
          <script src="<?php echo base_url()."contents/scripts/jquery.tinytooltip.min.js";?>"></script>
        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()."contents/styles/styles.css";?>"/>
	
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
       
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <script>
            $(function() {
                $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });

            });
            $(function() {
                $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });
            });

        </script>
        
        <script type="text/javascript">
            $(function() {
$('li#me').hover(function() {$('.div2').show()});
$('.div2').hover(function() {}, function() {$('.div2').hide()}});   



</script>

</head>
<body>
          <div id="header">


               
                   
                
                    <div id="headerLogo">

                        <img src="<?php echo base_url() . "contents/images/ParkReserve.png"; ?>"/>

                    </div>
              <div class="navigationTop">
                  <ul>
                      <li><a href="<?Php echo base_url().'index.php' ?>">HOME</a></li>
                      <li><a href="#">DOCUMENTATION</a></li>
                      <li><a href="<?Php echo base_url().'index.php/dashboard/addNewRoomForm' ?>">DEVELOPER TOOLS</a></li>
                      <li><a href="<?Php echo base_url().'index.php/login/registrationForm' ?>" >SIGN UP</a></li>
                      <li id="me"><a  href="<?Php echo base_url().'index.php/login/loginForm' ?>">LOGIN</a></li>
                  </ul>
                    
                    
                    
                    
                    
              </div>


            </div>
    <div class="div2"><h1 style="display: hidden;">Hi</h1></div>