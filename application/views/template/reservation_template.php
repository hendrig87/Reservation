<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />

<script>
$(document).ready(function(){
  $(document).ajaxStart(function(){
    $("#loading").css("display","block");
  });
  $(document).ajaxComplete(function(){
    $("#loading").css("display","none");
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
 //
    
        $(".middleLayer").show();
         $(".popup").show();
 }
 
 
 
    function hide(obj) {
   
    var el = document.getElementById(obj);

        el.style.display = 'none';
         $(".middleLayer").fadeOut(300);
         
         
         $('#right').drags();
    }
 
</script>



<script type="text/javascript">
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
               <form method="post" action="#" id="checkin_room">
            <table>
                <tr>
                    
                    <td class="tabledata">
                      <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:185px; cursor:pointer;" id="CheckIn" value="">
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
                <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" required="required" id="CheckOut" value="">
                <span class="add-on" style="width:auto;"><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div>
                    </td>
                    
                    <td style="width:10px;"></td>
                    
                    <td class="tabledata">
                         <div class="input-prepend input-append">
                             <span class="add-on">Children</span>
                       
                             <select name="children" required id="child" style="border-radius:0px 5px 5px 0px;">

                            <?php
                            for ($i = 1; $i <= $children; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                             </div>
                    </td>
                    <td style="margin-top:-15px;">
                        <input type ="button" value="Submit" style="margin-top:-25px;" onclick="javascript:changeFunc();">
                      
                    </td>
            </table>
        </form>
               
             
        
               
        </div>
        </div>
</div>






<!-- ================================================================================================
=============================================================================================== -->

<!-- booking -->

<div class="middleLayer" style="display:none"></div>

<div id="right" class="popup" style="display: none">
    <div>
    <div class="popupTitleBox" >
        <span class="popupTitleText">Booking</span>
        <span style="float:right;"><a href="#" id="closePopup" onClick="hide('right')" > Close </a></span>
    </div> 
    </div><br>
    
    <hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
   
    <!-- Information from checkin - $abc -->
   
    
    <div id="replaceMe">
        <img width="30" src="<?php echo base_url()."contents/images/loading1.gif"; ?>" alt="loading.." id="loading"/>
    
    </div>
    
</div>








