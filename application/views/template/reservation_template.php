<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />

<script>
<<<<<<< HEAD
$(document).ready(function(){
   var replaced = $("#changePopup").html();
    $("#closePopup").click(function(){
        $("#changePopup").html(replaced);
         });
         
    
    $("#checkin").click(function(){
         $(".middleLayer").show();
         $(".popup").show();
         //alert("i m here");
   loading(); // loading
	            setTimeout(function(){ // then show popup, deley in .1 second
	closeloading();
        path();
         $('#one').css({'background-color': '#0077b3'}); 
         $('.first').css({'color': '#0077b3'}); 
         $('.first').css({'font-weight': 'bold'});
         
       //alert ("i m here also");
        changeFunc(); // function show popup
	            }, 1000); // .1 second
	    
     
    });
    });
</script>



<script type="text/javascript">
    
  function changeFunc() {
      
      var checkin = $("#CheckIn").val();
      var checkout = $("#CheckOut").val();
     var adult = $("#adult").val();
      var child = $("#child").val();
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/post_action' ;?>",
 data: {
     'checkin' : checkin,
     'checkout' : checkout,
     'adult' : adult,
     'child' : child,
     'hotelId':"1"
        },
  success: function(msg) 
        {
            
            
            $("#replaceMe").html(msg);
            
            
        }
 });
 
 }

  
    $(document).ready(function(){   
        //close popup.
        $("#closePopup").click(function(){
           $("#pop_up").hide();
            $(".middleLayer").fadeOut(300);
        });
          
    });
</script>
<script>
var currenttime = "Apr 28, 2014 2:41:06 PM";
var greeting = " PM";
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
var numbersEng = Array(0,1, 2, 3, 4, 5, 6, 7, 8, 9);
var serverdate=new Date(currenttime);					
function padlength(what){
	var output=(what.toString().length==1)? "0"+what : what
	return output
}					
function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1)
	var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
	var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
		if(timestring == "23:59:59"){
			window.location.reload()
		} else {
			var arr = timestring.split("");
				for(i=0; i < arr.length; i++){
					if(arr[i] != ":"){
					arr[i] = numbersEng[arr[i]];
				}
			}
			timestring = arr.join("");
			document.getElementById("NepaliTime").innerHTML= timestring + greeting ;
		}
}
setInterval("displaytime()", 1000);
 </script>
    
    <?php
        $adultsNumber = 5;
        $children = 5;
        ?>
<div id="container">
    
	<div id="body">
	
           <div class ="checkForm">
               <span class="error"><span class="error_sign">!</span>&nbsp;Invalid Date. Enter (yyyy/mm/dd) date format. </span>
               <form method="post" action="#" id="checkin_room">
                   <table>
                <tr>
                    
                    <td class="tabledata">
                      <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:185px; cursor:pointer;" id="CheckIn">
                <span class="add-on" style="width:auto; "><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div> 
                    </td>
                    
                    <td style="width:10px;"></td>
                    
                    <td class="tabledata">
                        <div class="input-prepend input-append">
                     <span class="add-on">Adults</span> 
                                       
                        <select name="adults" id="adult" style="border-radius:0px 5px 5px 0px;">

                            <?php
                            for ($i = 1; $i <= $adultsNumber; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                        </div>
                    </td>
                </tr>
                <br/>
                <tr>
                   
                    <td class="tabledata">
                       <div class="clear"></div>
                <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" id="CheckOut" value=""  required="required">
                <span class="add-on" style="width:auto;"><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div>
                    </td>
                    
                    <td style="width:10px;"></td>
                    
                    <td class="tabledata">
                         <div class="input-prepend input-append">
                             <span class="add-on">Children</span>
                       
                             <select name="children" required id="child" style="border-radius:0px 5px 5px 0px;">
                                 <option value="0" > Select</option>
                            <?php
                            for ($i = 1; $i <= $children; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                             </div>
                    </td>
                    <td style="margin-top:-15px;">
                        <input type ="button" value="Submit" style="margin-top:-25px;" id="checkinbtn">
                      
                    </td>
            </table>
        </form>
               
             
        
               
        </div>
        </div>
</div>



<!-- ================================================================================================
=============================================================================================== -->

<!-- booking -->

<div class="popup" id="pop_up"style="display: none">
   
    <div>
        <div id="popupTitleBox" style="width:100%;">
            <span class="back" style="float:left;width:40%;text-align: left;">&nbsp; <!--<a href="" id="back"> < </a>--></span>
        <span class="popupTitleText" style="float:left;width:10%;color: white;margin-top: 5px;">Booking</span>
        <span style="float:right;width:40%;text-align: right; color: white;"><a href="#" id="closePopup" > X </a></span>
    </div> 
    </div><br>
    
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
    <br>
    <hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc; padding: 0; margin-top: 18px;">
    </div>
    
    <div id="loading"> <img width="30" src="<?php echo base_url().'contents/images/page-loader.gif' ; ?>" alt="loading.."/><br><b>Loading...</b></div>
    <div id="replaceMe">
        
    </div>
    </div>
    
</div>
 

<div class="middleLayer" style="display:none"></div>






