<script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
       
<script src="<?php echo base_url() . 'contents/scripts/jquery.js'; ?>" type="text/javascript"></script>
<style type="text/css">
    /* popup_box DIV-Styles*/
    .popup_box { 
        display:none; /* Hide the DIV */
        position:absolute;  
        _position:absolute; /* hack for internet explorer 6 */  
        height:200px;  
        width:800px;  
        background:#FFFFFF;  
        left: 300px;
        top: 50px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;  

        /* additional features, can be omitted */
        border:1px solid black;  	
        padding:25px;  
        font-size:15px;  
        -moz-box-shadow: 0 0 5px #a9a4a4;
        -webkit-box-shadow: 0 0 5px #a9a4a4;
        box-shadow: 0 0 2px #a9a4a4;

    }
    a{  
        cursor: pointer;  
        text-decoration:none;  
    } 

    /* This is for the positioning of the Close Link */
    #popupBoxClose {
        font-size:20px;  
        line-height:15px;  
        right:5px;  
        top:5px;  
        position:absolute;  
        color:#6fa5e2;  
        font-weight:500;  	
    }
    #popupaction {
        font-size:20px;  
        line-height:15px;  
        right:5px;  
        position:absolute;  
        color:#6fa5e2;  
        font-weight:500;  	
    }
    #popup_box_get_code { 
        display:none; /* Hide the DIV */
        position:absolute;  
        _position:absolute; /* hack for internet explorer 6 */  
        height:200px;  
        width:800px;  
        background:#FFFFFF;  
        left: 255px;
        top: 50px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;  

        /* additional features, can be omitted */
        border:1px solid black;  	
        padding:25px;  
        font-size:15px;  
        -moz-box-shadow: 0 0 5px #a9a4a4;
        -webkit-box-shadow: 0 0 5px #a9a4a4;
        box-shadow: 0 0 2px #a9a4a4;

    }
    .container { position: relative; width: 150px; height: 150px; float: left; margin-left: 10px; }
.radioButton { position: absolute; bottom: 0px; right: 0px; }
</style>
<script type="text/javascript">

    $(document).ready( function() {
        // When site loaded, load the Popupbox First
        $('.srcimage').click(function(){
          
            $('.popup_box').fadeIn(500);
            var srcimg = $(this).attr('src');
		
                
               
            $("#pqr").attr({
                src: srcimg
			
            });
            $('.popup_box').css({"display":"Block"});
            $('.detailsImage').css({"opacity":".3"});
			
        });
		
        $('#popupBoxClose').click( function() {
            unloadPopupBox();
        });
		
        function unloadPopupBox() {	// TO Unload the Popupbox
            $('.popup_box').fadeOut("slow");
            $(".detailsImage").css({ // this is just for style		
                "opacity": "1"  
            }); 
        }
        
        $("#closePopup").click(function(){
           $("#pop_up").hide();
            $(".middleLayer").fadeOut(300);
        });
        
         $('#popupaction').click( function() {
             unloadPopupBox();
            $(".middleLayer").show();
         $(".popup").show();
     openPopUp();    
   loading(); // loading
                    setTimeout(function(){ // then show popup, deley in .1 second
        closeloading();
        path();
         $('#one').css({'background-color': '#0077b3'}); 
         $('.first').css({'color': '#0077b3'}); 
         $('.first').css({'font-weight': 'bold'});
         
      
        // function show popup
                    }, 1000); // .1 second
        });	
	
        function openPopUp() {
                        
                         $('#loading').show();
                     var title=""
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php/room_booking/post_action'; ?>",
                            data: {
                                'checkin': 2014 - 05 - 07,
                    'checkout': 2014 - 05 - 08,
                    'adult': 2,
                    'child': 2,
                    'hotelId': 4,
                    'title': title
                },
                success: function(msg)
                {

                    $("#replaceMe").html(msg);

                },
                complete: function() {
                    $('#loading').hide();
                }
            });
        }

    });


</script>
<script>

    function getCode()
    {
        var valid = true;
        var msg = "Incomplete form, please fill the form correctly";
        var apiName = $("#apiName").val();
        var api = $("#selectApi").val();
        var hotel = $("#selectHotel").val();
        var payment = $("input[type='radio'][name='payment']:checked").val();
        var template = $("input[type='radio'][name='temp']:checked").val();
   

        if ((apiName == null) || (apiName == "") || (!apiName.match(/^[a-z,0-9,A-Z_ ]{5,35}$/))) {     
            $("#apiName").focus();
            msg="You need to fill the title field in correct format!\n";
           valid = false;
          
        }

        if ((api == null) || (api == "0")) {
            $("#selectApi").focus();
           msg="You need to select the api!\n";
            valid = false;
        }

        if ((hotel == null) || (hotel == "0")) {
            $("#selectHotel").focus();
           msg="You need to select the hotel!\n";
            valid = false;
        }
        if ((template == null) || (template == "")) {
            $(".radioButton").focus();
          msg="You need to select template!\n";
            valid = false;
        }
        if ((payment == null) || (payment == "")) {
            $(".paymentButton").focus();
          msg="You need to select payment option!\n";
            valid = false;
        }
        if (valid === false) {
            //alert('msg');
            $("#msgs").html(msg);
        }
        else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php/application/requestCode'; ?>",
                data: {
                    'apiName': apiName,
                    'api': api,
                    'hotel': hotel,
                    'payment':payment,
                    'template': template
                },
                success: function(msg)
                {
                    $("#popup_box_get_code").show();
                    $("#replaceable").html(msg);

                }
            });
        }
    }

    $(document).ready(function() {
        $('#popUpClose').click(function() {
            var location = window.location;   
                location.reload(true);
            $("#popup_box_get_code").hide();
            
        });
    });
</script>

<div class="right">

    <h2>Get Code</h2><hr class="topLine" />

    <div id="sucessmsg"> 
        <?php
        echo validation_errors();
        if ($this->session->flashdata('message')) {
            ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15" width="15"/>
            <?php
            echo $this->session->flashdata('message');
        }
        ?>

    </div>
    <div id="msgs" style="color:#990000 ;"></div>
    <div id="form">
        <table>
            <tr>
                <td id="alignright">Title:</td>
                <td><input type="text" name="api_title" id='apiName' value="<?php echo set_value('api_title'); ?>" ></td>

            </tr>
            <tr>

                <td id="alignright">Select API:</td>
                <td><select name="selectApi"  id="selectApi" onchange="changeFunc();">
                        <option value="0">Select Api</option>
                        <?php
                        if (!empty($apiName)) {
                            foreach ($apiName as $data) {
                                ?>
                                <option value="<?php echo $data->id; ?>">
                                <?php echo $data->api_name; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>

                    </select></td>

            </tr>

            <tr>

                <td id="alignright">Select Hotel:</td>
                <td><select name="selectHotel"  id="selectHotel" onchange="changeFunc();">
                        <option value="0">Select Hotel</option>
                        <?php
                        if (!empty($hotelName)) {
                            foreach ($hotelName as $data) {
                                ?>
                                <option value="<?php echo $data->name; ?>">
                                <?php echo $data->name; ?>
                                </option>
        <?php
    }
}
?>

                    </select></td>

            </tr>
            
            <tr>
                <td id="alignright">payment Option:</td>
               <td><input type="radio" name='payment' value='0' class="payButton"/> I want to make payment compulsion.
                   <input type="radio" name='payment' value='1' class="payButton"/> I want to make payment optional.</td>

            </tr>
            
            <tr>
                <td>Select Template:</td>
                <td> 

                        <div class="container">
                            <input type="radio" name='temp' value='1' class="radioButton"/><a href="#"><img class="srcimage" src="<?php echo base_url() . "contents/images/1.jpg"; ?>" height="150" width="150"/></a>
                        </div>

                        <div class="container">
                            <input type="radio" name='temp' value='2' class="radioButton"/><a href="#"><img class="srcimage" src="<?php echo base_url() . "contents/images/2.jpg"; ?>" height="150" width="150"/></a>
                        </div>

                        <div class="container">
                            <input type="radio" name='temp' value='3' class="radioButton"/><a href="#"><img class="srcimage" src="<?php echo base_url() . "contents/images/3.jpg"; ?>" height="150" width="150"/></a>
                        </div>
                    
                        <div class="container">
                            <input type="radio" name='temp' value='4' class="radioButton"/><a href="#"><img class="srcimage" src="<?php echo base_url() . "contents/images/4.jpg"; ?>" height="150" width="150"/></a>
                        </div>
                    
                </td>
            </tr>
            <tr>

                <td><input type="submit" value="Get Code" onclick="getCode()" name="submit" id="getCodeButton"></td>

<?php //form_close()  ?>

            </tr>
        </table>


    </div>
    <div class="popup_box">	<!-- OUR PopupBox DIV-->
        <img  src="" width="800" height="200" id="pqr"  />
        <a id="popupBoxClose">Close</a>
        <a id="popupaction">View in action</a>
    </div> 
</div>
<div id="clear"></div>
</div>




<!-- booking -->

<div class="popup" id="pop_up"style="display: none">

    <div>
        <div id="popupTitleBox" style="width:100%;">
            <span class="back" style="float:left;width:40%;text-align: left;">&nbsp; <!--<a href="" id="back"> < </a>--></span>
            <span class="popupTitleText" style="float:left;width:10%;color: white;margin-top: 5px;">Booking</span>
            <span style="float:right;width:40%;text-align: right; color: white;"><a href="#" id="closePopup" > X </a></span>
        </div> 
    </div><br/>

    <div id="changePopup">
        <!-- Information from checkin - $abc -->
        <div id="path" style="display: none;">
            <hr id="nav">
            <div id="mainNav">

                <div class="number" id="one">1</div><span id="nav_description" class="first">Select Plan</span>
                <div class="number" id="two" style="margin-left: 18%;">2</div><span id="nav_description" class="second" style="left: -70px;">Booking Summary</span>
                <div class="number" id="three" style="margin-left: 18%;">3</div><span id="nav_description" class="third">Billing & Payments</span>
                <div class="number" id="four" style="margin-left: 10%;">4</div><span id="nav_description" class="fourth">Thank You</span>
            </div>
            <br/>
            <hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc; padding: 0; margin-top: 18px;">
        </div>

        <div id="loading"> <img width="30" src="<?php echo base_url() . 'contents/images/page-loader.gif'; ?>" alt="loading.."/><br><b>Loading...</b></div>
        <div id="replaceMe">

        </div>
    </div>

</div>


<div class="middleLayer" style="display:none"></div>


<?php
if (isset($xyz))
    echo $xyz;
?>



<div id="popup_box_get_code" >

    <a id="popUpClose">Close</a>
    <div id='replaceable'></div>
</div> 