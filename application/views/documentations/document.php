<?php
$adultsNumber = 5;
$children = 5;
?><div class="right">
    <div id='ttoopp'>
        <h2>Documents</h2><hr class='topLine'/>


        <h3>Reservation code API: Documentation</h3>

        <p>Using our API, you can create Your own code for online reservation system in your websites for hotels. The documents listed here are mainly targeted at application/web developers – but don’t let that scare you away in case you’re new to the subject. We’re pretty sure that using the API is rather straightforward, even for beginners.</p>

        <h3>How to use:</h3>
        <p>Here is step wise procedure to accomplish the working functionality of api:</p>
        <p><strong>1.</strong> First You are required to add your hotel. For this click on hotel menu and then click on add new hotel.</p>
        <p><strong>2.</strong> Then click on apps and then click on create new api. provide the name of api you desire.</p>
        <p><strong>3.</strong> Then click on apps and then get code. provide the title as your requirement, select your api, select your hotel to which you want to use the code and then select the predefined template and then click on getcode button.</P>
        <p><strong>4.</strong> Copy that code and paste into your webpage file where you want reservation template.</p>




        <h3>Using the code</h3>
        <p>You can simply copy and paste the code as shown below to your website<strong> html</strong> code. </p>
    </div>
    <div id='code'>
        <pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:400px; width: 930px; margin:  0px ; padding: 0px;">
    <!dictype html>
    <html>
    <head>
    <title>Online reservation system</title>
    <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> 
    <script src="http://localhost/reservation/contents/scripts/apiused.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> 
    </head>
    <body>      
     <?php $adultsNumber = 5; $children = 5;   ?>
       <div id="reservation">
        <span class="error"><span class="error_sign">!</span> Invalid Date. Enter (yyyy/mm/dd) date format. </span>
        <form method="post" action="#" id="checkin_room">
            <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:185px; cursor:pointer;" id="CheckIn">
                <span onclick="movecursor()" class="add-on" style="width:auto; cursor:pointer; "><img src="<?php echo base_url() . "contents/images/ParkReserve.png"; ?>" alt="" width="15" height="20" ></span>
            </div> 
            <div class="input-prepend input-append">
                <span class="add-on">Adults</span> 
                    <select name="adults" id="adults" style="border-radius:0px 5px 5px 0px;">
                        <?php
                            for ($i = 1; $i <= $adultsNumber; $i++) {
                            echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="clear"></div>
            <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" id="CheckOut" value=""  required="required">
                <span onclick="movecursornext()" class="add-on" style="width:auto; cursor:pointer;"><img src="<?php echo base_url() . "contents/images/ParkReserve.png"; ?>" alt="" width="15" height="20" ></span>
            </div>
            <div class="input-prepend input-append">
                <span class="add-on">Children</span>
                    <select name="children" required id="childs" style="border-radius:0px 5px 5px 0px;">
                        <option value="0" > Select</option>
                        <?php
                            for ($i = 1; $i <= $children; $i++) {
                            echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                        ?>
                    </select>
            </div>
            <input type="hidden" id="hotelId" value="sample hotel"/>
            <input type ="button" value="Check availability" class="checkinbtn" id="checkinbtn">           
        </form>
       </div>

        <div class="popup" id="pop_up"style="display: none">
         <div>
          <div id="popupTitleBox" style="width:100%;">
            <span class="back" style="float:left;width:40%;text-align: left;">  <!--<a href="" id="back"> < </a>--></span>
            <span class="popupTitleText" style="float:left;width:10%;color: white;margin-top: 5px;">Booking</span>
            <span style="float:right;width:40%;text-align: right; color: white;"><a href="#" id="closePopup" > X </a></span>
          </div> 
         </div><br/>
        <div id="changePopup">
    
        <div id="path" style="display: none;">
         <hr id="nav">
         <div id="mainNav">
        
        <div class="number" id="one">1</div><span id="nav_description" class="first">Select Plan</span>
        <div class="number" id="two" style="margin-left: 18%;">2</div><span id="nav_description" class="second" style="left: -70px;">Booking Summary</span>
        <div class="number" id="three" style="margin-left: 18%;">3</div><span id="nav_description" class="third">Billing & Payments</span>
        <div class="number" id="four" style="margin-left: 10%;">4</div><span id="nav_description" class="fourth">Thank You</span>
        </div>
        <br/>
       <hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; padding: 0; margin-top: 18px;">
       </div>
    <div id="loading"> <img width="30" src="<?php echo base_url() . "contents/images/page-loader.gif"; ?>" alt="loading.."/><br><b>Loading...</b></div>
    <div id="replaceMe">   
    </div>
    </div>
   </div>
   <div class="middleLayer" style="display:none"></div>

                            <?php
                            if (isset($xyz))
                                echo $xyz;
                            ?>

 </body>
</html>  
          
</textarea>
</code>         
        </pre>
    </div>
    
    <h4>After using the above code you will get the view as:</h4>
        <img src="<?php echo base_url() . "contents/images/1.png"; ?>" alt="" width="100%" >
        <h4>When you enter check in date, check out date, no of adults and no. of childs and click on check availability button, you will get popup window as:</h4>
        <img src="<?php echo base_url() . "contents/images/roomselection.png"; ?>" alt="" width="100%" >
        <h4>When you select required number of rooms from listed rooms and click on next button, you will get view as:</h4>
    <img src="<?php echo base_url() . "contents/images/personalInfo.png"; ?>" alt="" width="100%" ><br/>
    <img src="<?php echo base_url() . "contents/images/personalInfoFilled.png"; ?>" alt="" width="100%" >
    <h4>When you provide your personal info and click on next button, you will get view as:</h4>
    <img src="<?php echo base_url() . "contents/images/payment.png"; ?>" alt="" width="100%" ><br/>    
    <p>Note: The above view of payment is optional. If you don't want your user to force to pay, you can exclude this view.</p>    
    <h4>When you provide payment info and click on next button you will get the following view and at the same time the email with booking information will be sent to your email inbox.</h4>    
     <img src="<?php echo base_url() . "contents/images/thankYouNote.png"; ?>" alt="" width="100%" ><br/>     
    
     
     <h3>Pre-requisites:</h3>
    
    <p>Windows 64 Bits Apache : 2.4.4 MySQL : 5.6.12 PHP : 5.4.12 PHPMyAdmin : 4.0.4 SqlBuddy : 1.3.3 XDebug : 2.2.3 <br/> 
       Windows 32 Bits Apache : 2.4.4 MySQL : 5.6.12 PHP : 5.4.16 PHPMyAdmin : 4.0.4 SqlBuddy : 1.3.3 XDebug : 2.2.3 </p>
    
    
    <div id='bottom'>
        <p>You can download necessary files here also. <a href="<?php echo base_url() . 'index.php/documentation/download/?download=' . 'test.js'; ?>" ><?php echo'Javascript file'; ?></a></p>

        <h3>Using Package</h3>
        <p>You can download necessary file from the download link. After completion of download include welcome_message.php file in your code and link to javascript files </p>




    </div>
</div>
<div id="clear"></div>
</div>