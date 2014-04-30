<!-- ------------------calling currency_modify helper for currency--------------------------------- -->
 <?php
            $this->load->helper('currency'); 
            
?>
<!-- ------------------finish calling currency_modify helper for currency--------------------------------- -->
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">

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
        },
  success: function(msg) 
        {
    
            $("#container").html(msg);
            
        }
 });
 //
    
        $(".middleLayer").toggle();
        $(".popup").toggle();
    
 }

function book()
{
   
     $(".middleLayer").toggle();
      $(".popup").hide(1000);
        $(".popup_personal_info").toggle();
     
    }
 </script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
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
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>



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
<?php
if(isset($abc))
{


?>
<div id="right" class="popup">
    <div>
    <div class="popupTitleBox" >
        <span class="popupTitleText">Booking</span>
        <span style="float:right;"><a href="#fkfhk" id="closePopup"> Close </a></span>
    </div> 
    </div><br>
    
    <hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
     
    <!-- Information from checkin - $abc -->
    
    <table style="width: 100%; background: #f3f2f2;">
        <tr>
            <td>Checkin Date:<?php echo $abc['checkin'];  ?></td>
            <td>Checkout Date:<?php echo $abc['checkout'];  ?></td>
            <td>No. of Adults:<?php echo $abc['adult'];  ?></td>
            <td>No. of Children:<?php echo $abc['child'];  ?></td>
        </tr>
    </table>
    
    <p></p>
    <!-- ----------------->
     <div id="room_book">
    <table width="100%">
        <tr>
            <th width="25%">Room</th>
            <th width="30%">Facilities</th>
            <th width="15%">Price</th>
            <th width="20%">Available Rooms</th>
            <th width="10%">Total Price</th>
    <?php
    if(isset($query))
    {
        foreach($query as $book)
    {
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url().'uploads/'.$book->image; ?>" width="50px" height="50px"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $book->room_name; ?></div><br>  
               
                
            </td> 
            <td><?php echo $book->description; ?></td>
            <td>
                  <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
            </td>
            <td> 
               <?php $available_room = $book->no_of_room; ?> 
                <select style="width: 80px;">
                      <?php
                            for ($i = 1; $i <= $available_room; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                   
                </select>
               
            </td>
        
            <td>    
                
            </td>
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
     </div>
    <div><input type="button" value="Book Now" onclick="javascript:book();"></div>
</div>

<?php
}
?>







<!-- =======================================================================================================================
=======================================================================================================-->
<!-- personal information -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />

<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<div class="popup_personal_info" style="display: none;">
<table>
        	<tr>
                <td style="width:400px;">
                <fieldset>
            <legend>Reservation Information</legend>

                <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:212px; cursor:pointer; border-radius: 0px 5px 5px 0px;" id="CheckIn" value="">
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:212px; cursor:pointer; border-radius: 0px 5px 5px 0px;" required="required" id="CheckOut" value="">
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Room</span>
                <select name="Room" style="width:223px;">
                </select>
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">No. of Adults</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Adults" name="NoAdults" >
                </div>
                <div class="input-prepend">
                <span class="add-on">No. of Childs</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Childs" name="NoChild" >
                </div>
              
                </div>
                
            </fieldset>
            
                
                </td>
                <td  style="width:40px;"></td>
                <td style="width:400px;">
                <fieldset>
            <legend>Personal Information</legend>
                <div class="input-prepend">
                <span class="add-on">Full Name</span>
                <input class="input input-large" type="text" placeholder="Full Name" required="required" name="FullName" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Address</span>
                <input class="input input-large" type="text" placeholder="Full Address" required="required" name="Address" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Occupation</span>
                <input class="input input-large" type="text" placeholder="Occupation" name="Occupation" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Nationality</span>
                <input class="input input-large" type="text" placeholder="Nationality" required="required" name="Nationality" >
                </div>
                
                
                
                
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Contact No.</span>
                <input onkeypress='return isNumberKey(event)' class="input input-large" type="text" placeholder="Contact Number" required="required" name="ContactNumber" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Email</span>
                <input class="input input-large" type="text" placeholder="Email Address" required="required" name="Email" >
                </div>
            </fieldset>
                    <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;"></textarea>
            <button type="submit" >Make A Reservation</button>
                </td>
            </tr>
        </table>
</div>