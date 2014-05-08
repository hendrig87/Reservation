<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<script>
  
$(document).ready(function(){
   var replaced = $("#changePopup").html();
    $("#closePopup").click(function(){
        $("#changePopup").html(replaced);
         });
     });
         
    
</script>

<div>
    <h3>Thank You for your booking. Your reservation has confirmed. We are willing to see you in our hotel.</h3>
    <a href="" id="closePopup" style="color: white;background: #2a61d5; font-size: 16px; padding: 8px 10px; border-radius:5px;">Close</a>
</div>