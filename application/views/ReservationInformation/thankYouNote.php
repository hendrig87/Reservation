<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<script>
 $(document).ready(function(){   
        //close popup.
        var base_url = "http://localhost/reservation/";
        $("#close").click(function(){
            
            var title = '1';
        
             $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/destroy_session',
        data: {
            
            
            'title':title
        },
        success: function(msgs)
        {

           $("#pop_up").hide();
        $(".middleLayer").fadeOut(300);
        }          
            
        });
          
    });
  });
         
    
</script>

<div>
    
    <h3>Thank You for your booking. Your reservation has been confirmed.</h3>
    <p>Details of your reservation have just been sent to you in a confirmation email, we look forward to seeing you soon. In the meantime if you have any questions feel free to contact us.</p>
    <a href="#" id="closePopup" style="color: white;background: #2a61d5; font-size: 16px; padding: 8px 10px; border-radius:5px;">Close</a>
</div>