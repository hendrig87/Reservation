<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<script>
    function hide(obj) {
   
    var el = document.getElementById(obj);

        el.style.display = 'none';
         $(".middleLayer").fadeOut(300);
         
         
         $('.popup').drags();
    }
</script>

<div>
    <h3>Thank You for booking.</h3><input type="button" id="popupBtn" value="Close" onclick="hide('pop_up')">
</div>