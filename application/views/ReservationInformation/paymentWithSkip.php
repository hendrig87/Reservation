        <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script>
function payment()
{
  var fullName = $("#fullname").val();
      var cardNumber = $("#cardnumber").val();
     var security = $("#securitynumber").val();
     var valid = true;
   var msg="Incomplete form, please fill the form correctly\n";
     
    if((fullName==null)||(fullName=="") || (!fullName.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){
    valid = false;
   
    }
   
   if((cardNumber==null)||(cardNumber=="") || (!cardNumber.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){  
    valid = false;
   }
   
   if((security==null)||(security=="") || (!security.match( /^[a-z,0-9,A-Z_ ]{5,35}$/ )) ){  
    valid = false;
   }
    
     if (valid==false){
        $("#msg").html(msg);
     }
     else{ 
     
      
      
      
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/payment_options' ;?>",
 data: {
     'fullName' : fullName,
     'cardNumber' : cardNumber,
     'securityNumber' : security},
  success: function(msgs) 
        {
//            $('#one').css({'background-color': '#0077b3'}); 
//            $('.first').css({'color': '#0077b3'}); 
//         $('.first').css({'font-weight': 'bold'});
//         $('#two').css({'background-color': '#999999'});
//                $('.second').css({'color': 'black'});
//                $('.second').css({'font-weight': 'normal'});
$(".trd").css({'display':'none'});
              $(".fth").css({'display':'block'});
            $("#replaceMe").html(msgs);
            
        }
 });
 }
 }
 
 function skip()
{
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().'index.php/room_booking/payment_options' ;?>",
 data: {
     'fullName' :"",
     'cardNumber' : "",
     'securityNumber' : ""},
  success: function(msgs) 
        {
//            $('#one').css({'background-color': '#999999'});
//         $('.first').css({'color': 'black'}); 
//         $('.first').css({'font-weight': 'normal'}); 
//         $('#two').css({'background-color': '#999999'});
//         $('.second').css({'color': 'black'}); 
//         $('.second').css({'font-weight': 'normal'}); 
//         $('#three').css({'background-color': '#999999'});
//         $('.third').css({'color': 'black'}); 
//         $('.third').css({'font-weight': 'normal'}); 
//         $('#four').css({'background-color': '#0077b3'});
//         $('.fourth').css({'color': '#0077b3'}); 
//         $('.fourth').css({'font-weight': 'bold'}); 
$(".trd").css({'display':'none'});
              $(".fth").css({'display':'block'});
            $("#replaceMe").html(msgs);
            
        }
 });
 
 }
 
 </script>
 
<script>
$(document).ready(function(){
       
     $('#loading').show();
    $(".payment").click(function(){
        
         $('#one').css({'background-color': '#999999'});
         $('.first').css({'color': 'black'}); 
         $('.first').css({'font-weight': 'normal'}); 
         $('#two').css({'background-color': '#999999'});
         $('.second').css({'color': 'black'}); 
         $('.second').css({'font-weight': 'normal'}); 
         $('#three').css({'background-color': '#999999'});
         $('.third').css({'color': 'black'}); 
         $('.third').css({'font-weight': 'normal'}); 
         $('#four').css({'background-color': '#0077b3'});
         $('.fourth').css({'color': '#0077b3'}); 
         $('.fourth').css({'font-weight': 'bold'}); 
        payment();
    });
    
     $('#loading').hide();
     });
</script>


<?php
 header("Access-Control-Allow-Origin: *");
$this->load->helper('currency');
$this->load->helper('availableRoom');
?>
 <?php if(!empty($value)){
     
     $totalPrice = $value['0'];
 } ?>

<div id="replaceMe">
<input type="hidden" id="title" value="<?php echo $this->session->userdata('title'); ?>" >
<input type="hidden" id="selectedHotelId" value="<?php echo $this->session->userdata('hotelId'); ?>" >
    <div id="pi_booking_summary">
        <legend id="booking_summary_title">Booking Summary</legend> 
        <div id="table">

        </div>   
        
    </div>
 <div id="totalPrice">Total:<?php echo $totalPrice; ?></div>
<table style="width: 100%;">
    <tr>
                <td style="width:400px;">
               
                   
                    <legend style="border-bottom: solid thin #CCC;width: 80%;top: -10px;">Secure Payment Info</legend>
                    
                    <img src='<?php echo base_url().'contents/images/card-logos.jpg' ;?>' style="width: 380px; height: 100px;" >
                  <strong id="msg" style="color:#990000 ;"></strong>   
                <div class="input-prepend">
                <span class="add-on">Name in Card</span>
                <input class="input input-large" type="text" placeholder="Name in credit card" required="required" name="FullName" id="fullname">
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Card Number</span>
                <input class="input input-large" type="text" placeholder="Credit card number" required="required" name="Address" id="cardnumber">
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Security Number</span>
                <input class="input input-large" type="text" placeholder="Security Number" name="Occupation" id="securitynumber" >
                </div>
                
               
                
                <div class="clear"></div>
              
                 <div class="tabledata">
                     
                     
                     
                     <div class="datepicker dropdown-menu"></div>
                      <div class="input-prepend input-append">
                <span class="add-on">Expiry Date</span>
                <input name="pickdate" type="text" required="required" style="width:185px; cursor:pointer;" id="pickdate" value="">
                <span class="add-on" style="width:auto; "><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' alt="" width="15" height="20" ></span>
                </div> 
                    </div>
               
            
            
              
                </td>
                <td  style="width:10px;border-right: solid thin #cccccc;"></td>
                <td style="width:400px;">
                <div id="personsInfo">
                    <legend style="border-bottom: solid thin #CCC;width: 80%;">Other Payment Method</legend>
              <form action = "http://esewa.f1dev.com/epay/main" method="POST">
<input value="<?php echo $totalPrice; ?>" name="tAmt" type="hidden">
<input value="<?php echo $totalPrice; ?>" name="amt" type="hidden">
<input value="0" name="txAmt" type="hidden">
<input value="0" name="psc" type="hidden">
<input value="0" name="pdc" type="hidden">
<input value="testmerchant" name="scd" type="hidden">
<input value="XYZ-1234" name="pid" type="hidden">
<input value="<?php echo base_url().'index.php' ?>" type="hidden" name="su">
<input value="<?php echo base_url().'index.php' ?>" type="hidden" name="fu">
<input value="Pay with e-Sewa" type="submit">
</form>     
              <img src='<?php echo base_url().'contents/images/esewa.jpg' ;?>'  >
            
              <img src='<?php echo base_url().'contents/images/payway.jpg' ;?>'  >
              
              
            </div>
          
                </td>
            </tr>
        </table>
<div id="action">
    
    <input type="submit" id="popupBtn" value="Back" onclick="backbutton()" class="backBtnPayment">
    <input type="submit" id="popupBtn" value="Skip" onclick="skip()" class="SkipPay">
    <input type="submit" id="popupBtn" value="Next" class="payment">
</div>
</div>