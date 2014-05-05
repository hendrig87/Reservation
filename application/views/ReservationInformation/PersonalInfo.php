<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>



<script>
// $('#meroid').html(txtnext[1].no_of_room);

//$('#meroidnext').html(txtnext[2].no_of_room);
var predata='<table width="400px" style="padding-top: 20px;">'+
        '<tr style="background:#e6e9f2;font-weight: bold;border-bottom:solid thin #CCCCCC;" >'+
        '<td style="width:35%;">Rooms</td>'+
        '<td style="width:20%;">Booked</td>'+
        '<td style="width:20%;">Price</td>'+
        '<td style="width:25%;">Sub-Total</td></tr>';
var nextdata="";
    for(var i=0;i<txtnext.length;i++)
    {
        nextdata +='<tr style="border-bottom:solid thin #CCCCCC;"><td><span id="room_name">'+
                txtnext[i].room_name+'</span> </td><td><span id="booked_room">'+
                txtnext[i].no_of_room+'</span> </td><td><span id="room_price">'+
                txtnext[i].price+'</span></td><td><span id="sub_total"></span></td></tr>';
        
    
}

var postdata = '<tr style="border-bottom:solid thin #CCCCCC;"><td colspan="2"><b>Total Price</b></td><td></td></tr></table>';
$('#table').html(predata + nextdata + postdata);

</script>

<script>
$(document).ready(function(){
    $(".personalInfo").click(function(){
        
         $('#one').css({'background-color': '#999999'});
         $('.first').css({'color': 'black'}); 
         $('.first').css({'font-weight': 'normal'}); 
         $('#two').css({'background-color': '#999999'});
         $('.second').css({'color': 'black'}); 
         $('.second').css({'font-weight': 'normal'}); 
         
         $('#three').css({'background-color': '#0077b3'});
         $('.third').css({'color': '#0077b3'}); 
         $('.third').css({'font-weight': 'bold'}); 
        roomBook();
    });
     });
</script>


<script>
function roomBook()
{
      var dataString = 'hotelId=' + '1';
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/personal_info' ;?>",
 data: dataString,
  success: function(msgs) 
        {
    
            $("#replaceMe").html(msgs);
            
        }
 });
  $('#one').css({'background-color': '#999999'});
 }
 </script>
 <div id="room_book">
<div style="float: left;">
    
 
    
   
<legend style="width: 80%;border-bottom: solid thin #ccc;">Booking Summary</legend> 


    <div id="table" style="background: e6e9f2;"></div>                  
                        
</div>
                            
                            
     <div  style="float:left;">                       
<table>
    <tr>
               
                <td  style="width:80px;border-right: solid thin #cccccc;"></td>
                <td style="width:400px;float: left;">
                    <fieldset style="margin-left:75px;">
                    <legend style="width: 80%;border-bottom: solid thin #ccc;">Personal Information</legend>
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
                 <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;"></textarea>
            </fieldset>
                   
                    
                </td>
            </tr>
        </table>
         <div id="action">
             <input type="submit" value="Next" id="popupBtn" class="personalInfo" style="margin-bottom: 10px;">
          </div>
    
        </div>
 </div>