  <script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">

<script>
function book()
{
   
     
     var dataString = 'hotelId=' + '1';
  
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/book_now' ;?>",
 data: dataString,
  success: function(msgs) 
        {
    
            $("#room_book").html(msgs);
            
        }
 });
 
 
}
    
    function hide(obj) {
   
    var el = document.getElementById(obj);

        el.style.display = 'none';
         $(".middleLayer").fadeOut(300);
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






<!--loading currency_helper  -->
<?php
            $this->load->helper('currency'); 
            
?>
<!--      -->
<table class="room-listing-tbl" style="width: 100%; background: #f3f2f2;">
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
                <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $book->room_name; ?></div><br>  
               
                
            </td> 
            <td><?php echo $book->description; ?></td>
            <td>
                  <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
            </td>
            <td> 
               <?php $available_room = $book->no_of_room; ?>
               
                <select class="available-room" style="width: 80px;">
                    <option value="0">Select</option>
                      <?php
                            for ($i = 1; $i <= $available_room; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                   
                </select>
               
            </td>
        
            <td>    
                <span class="subTotal"></span>
            </td>
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
         <div style="text-align: right;">
    
        <input type="submit" value="Book Now" onclick="javascript:book();"></div>
     </div>