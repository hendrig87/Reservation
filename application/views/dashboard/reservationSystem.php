<script>
    $(function () {

    $('#cssmenu ul li').click(function () {
  $("li").removeClass("has-sub");
  $(this).addClass("active has-sub");
});

});

    
    </script>
<div id="main">
<div id="left">
    <div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href="<?php echo base_url().'index.php/dashboard/bookingInfo'; ?>"><span>Hotel</span></a>
      <ul>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/hotels/hotelListing'; ?>"><span>View Hotels</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/hotels/index'; ?>"><span>Add New Hotel</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/dashboard/roomInfo'; ?>"><span>View Rooms</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/dashboard/addNewRoomForm'; ?>"><span>Add New Room</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/dashboard/bookingInfo'; ?>"><span>View Booking</span></a></li>
        <li class='has-sub'><a href="<?php echo base_url().'index.php/dashboard/calender'; ?>"><span>Calendar</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href="<?php echo base_url().'index.php/application/index'; ?>"><span>Apps</span></a>
       <ul>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/application/index'; ?>"><span>Create New API</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/application/getCode'; ?>"><span>Get Code</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/application/apiListing'; ?>"><span>View API's</span></a></li>
         <li class='has-sub'><a href="<?php echo base_url().'index.php/application/codeListing'; ?>"><span>View My Codes</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href="<?php echo base_url().'index.php/documentation/index'; ?>"><span>Documentation</span></a>
   <ul>
         <li class='has-sub'><a href="#ttoopp"><span>What Is It ?</span></a></li>
         <li class='has-sub'><a href="#code"><span>How It Works ?</span></a></li>
         <li class='has-sub'><a href="#bottom"><span>How To Use ?</span></a></li>
      </ul>
   
   </li>
</ul>
</div>

</div>
    
    