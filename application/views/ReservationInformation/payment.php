<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
        <script src="<?php echo base_url() . 'contents/scripts/calendar.js' ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>


<script>
function payment()
{
      var dataString = 'hotelId=' + '1';
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/payment_options' ;?>",
 data: dataString,
  success: function(msgs) 
        {
    
            $("#replaceMe").html(msgs);
            
        }
 });
 }
 </script>

<script type="text/javascript">
var currenttime = "Apr 25, 2014 2:41:06 PM"										
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


<table>
        	<tr>
                <td style="width:400px;">
                <fieldset>
                    <legend>Credit Card</legend>
                    <img src='<?php echo base_url().'contents/images/card-logos.jpg' ;?>' style="width: 380px; height: 100px;" >
                    
                <div class="input-prepend">
                <span class="add-on">Name in Card</span>
                <input class="input input-large" type="text" placeholder="Name in credit card" required="required" name="FullName" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Card Number</span>
                <input class="input input-large" type="text" placeholder="Credit card number" required="required" name="Address" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Security Number</span>
                <input class="input input-large" type="text" placeholder="Security Number" name="Occupation" >
                </div>
                
               
                
                <div class="clear"></div>
               <div class="input-prepend input-append">
                <span class="add-on">Expiry Date</span>
                <select name="yearpicker" id="yearpicker"></select>
               <?php  ?>
                </div>
               
            </fieldset>
            
              
                </td>
                <td  style="width:40px;"></td>
                <td style="width:400px;">
                <fieldset>
              <legend>Payment Method</legend>
              
              <img src='<?php echo base_url().'contents/images/esewa.jpg' ;?>'  >
            
              <img src='<?php echo base_url().'contents/images/payway.jpg' ;?>'  >
              
              
            </fieldset>
            <input type="submit" value="Continue" onclick="javascript:payment();">
                </td>
            </tr>
        </table>