

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
                       
                    </td>
                    <td class="tabledata">
                      <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:185px; cursor:pointer;" id="CheckIn" value="">
                <span class="add-on" style="width:auto; "><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div> 
                    </td>
                    <td class="tabledata">
                        Adults 
                    </td>
                    <td class="tabledata">
                        <select name="adults" id="adult">

                            <?php
                            for ($i = 1; $i <= $adultsNumber; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <br/>
                <tr>
                    <td class="tabledata">
                        
                    </td>
                    <td class="tabledata">
                       <div class="clear"></div>
                <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" required="required" id="CheckOut" value="">
                <span class="add-on" style="width:auto;"><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div>
                    </td>
                    <td class="tabledata">
                        Children
                    </td>
                    <td class="tabledata">    
                        <select name="children" required id="child">

                            <?php
                            for ($i = 1; $i <= $children; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td class="tabledata">
                        <input type ="button" value="Submit" onclick="javascript:changeFunc();">
                      
                    </td>
            </table>
        </form>
               
             
        
               
        </div>
        </div>

	  <?php
        if(isset($abc))
        {
            var_dump($abc);  
            echo $abc['checkin'];
        foreach($abc as $key=>$g)
        {
           // var_dump($g);
       // echo $g['checkin'];
            echo $key."==".$g;
        }
        }
          
        ?>
</div>







<!--
<div id="booking">
    <div id="booking_title">Room Booking </div>
    <div id="booking_contain">
        
    </div>
    <div id="booking_action">
        <input type="button" value="Book Now">
        <input type="button" value="Cancel">
        
        
    </div>
    
    
</div>
-->