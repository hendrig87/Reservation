<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Online Reservation System</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()."contents/styles/stylesheet.css"; ?>"/>
	
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
<style>
    body{
        margin: 0;
        padding: 0;
    }

 #headerDivFull
 {
     background-color: #002166;
     margin: 0;
     padding: 0;
 }
 
 #headerDiv p
 {
     color:#fff;
 }
 
 #headerLeft
 {
     width: 40%;
     float: left;
    
 }
 #headerRight
 {
     width: 40%;
     float: right;
 }

    .clear
    {
        clear: both;
        height: 1px;
    }
</style>
<body>
    <div id="headerDivFull">
        <div id="headerDiv">
            <div id="headerLeft">
                <p>Image Section</p>
            </div>
            <div id="headerRight">
                <p>Navigation Section</p>
            </div>
           
        </div>
         <div class="clar"></div>
    </div>
     <div class="clar"></div>