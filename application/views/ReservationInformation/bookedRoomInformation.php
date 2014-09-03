<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
        <script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
        

<script type="text/javascript">
  function changeFuncs() {
   
   var selectedValue = $("#selectBox").val();//selectBox.options[selectBox.selectedIndex].value;
   var checkIn=$("#checkin").val();
   var checkOut=$("#checkout").val();
   
 $.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/view' ;?>",
data: {
     'hotel' : selectedValue,
     'checkIn' : checkIn,
     'checkOut' : checkOut},
success: function(msgs) 
      {
  
          $("#room_book").html(msgs);
          
      }
});
}

 </script>

  <!-- hotel selection complete -->
     <script>
$(function() {
$( ".datepicker" ).datepicker();
});
</script>

  <div class="right">
      <h2>Booking Info</h2>
      
      <hr class="topLine" />
       <div class="filter">
           
           <input type="text" class="datepicker" placeholder="Check In date" id="checkin">
          <input type="text" class="datepicker" placeholder="Check Out date" id="checkout">
          <select name="selectMenu"  id="selectBox">
            <option value="0" selected="selected"> All Hotels                    
               </option>
              <?php var_dump($hotelName); if(!empty($hotelName)){
               foreach ($hotelName as $data)
               {
                   ?>
               <option value="<?php echo $data->id; ?>">
                   <?php echo $data->name; ?>
               </option>
                   <?php
              }}
               ?>
         
           </select>
          <input type="submit" value="Search" onclick="changeFuncs()" />
         
      </div> 
      
     <div id="room_book">
   <?php
    if(!empty($roomInfo))
    { ?>
    <table width="100%" style="border-collapse: collapse">
        <tr>
            <th width="17%">Room</th>
            <th width="7%">No. of room</th>
           
            <th width="12%">From - To</th>
            <th width="10%">Remain days</th>
            <th width="9%">No. of Pupil</th>
            <th width="25%">Contact Person/ Address</th>
             <th width="15%">Booked Hotel</th>
             <th width="4%">Action</th>
        </tr>  
    <?php
   
        foreach($roomInfo as $book)
    {
           
            $checkIn= $book->check_in_date;
            $checkOut = $book->check_out_date;
            $bookingId= $book->booking_id;
            $hotelId = $book->hotel_id;
           
            $currentDate = date("Y-m-d");
    $days = floor( ( strtotime( $checkOut ) - strtotime(  $checkIn ) ) / 86400 );
    $remain = floor( ( strtotime( $checkIn ) - strtotime(  $currentDate ) ) / 86400 );
            

            
         $bookedRoomInfo= $this->dashboard_model->get_all_booked_room_info($bookingId);
     
                
    if ($checkIn <= $currentDate && $checkOut >= $currentDate)
        { ?>
        <tr class="current" style="border-bottom:1px solid #ccc;" >
        <?php } else { ?>
       <tr class="upcomming" style="border-bottom:1px solid #ccc;">
  <?php  }   ?>
        
            <td>
        <?php foreach ($bookedRoomInfo as $bookedRooms){
             $room= $bookedRooms->room_type;
             $noOfRooms = $bookedRooms->no_of_rooms_booked; ?>
        
                
        <?php echo $room;?> <br/> <?php }?> 
                
                
            </td> 
            
           <td>
        <?php foreach ($bookedRoomInfo as $bookedRooms){
             $room= $bookedRooms->room_type;
             $noOfRooms = $bookedRooms->no_of_rooms_booked; ?>
        
                
        <?php echo $noOfRooms;?> <br/> <?php }?> </td>
            
            <td>
                <?php echo $checkIn.' to '.$checkOut.'<br/>('.$days.' days)'; ?>
            </td>
            
            
            <?php $personalInfo = $this->dashboard_model->get_booking_personal_info($bookingId);
    if(!empty($personalInfo))
    {        foreach ($personalInfo as $bookPerson){
        $bookingName= $bookPerson->full_name;
        $bookingEmail= $bookPerson->email;
        $bookAddress = $bookPerson->address;
        $contact = $bookPerson->contact_no;
        $child = $bookPerson->child;
        $adult = $bookPerson->adult;
        $totalPupil = $child + $adult;
        
        ?>

            <td><?php if($remain>=1){ echo $remain." days";}else{ echo "currently running";} ?></td>
        <td> <?php echo $totalPupil; ?></td>
        <td> <?php echo $bookingName."<br>". $bookingEmail."<br>".$bookAddress."<br>".$contact; ?></td>
       
        
        
    <?php }} ?>
        <?php $hotelInfo = $this->dashboard_model->get_hotel_info($hotelId);
        if(!empty($hotelInfo))
    {        foreach ($hotelInfo as $bookHotel){
        $hotelName= $bookHotel->name;
        $hotelAddress = $bookHotel->address;
        $contact = $bookHotel->contact;
    
        ?>
        <td><?php echo $hotelName;  ?></td> <?php }} else{ ?><td><?php echo 'hotel not found';  ?></td><?php } ?>
   <td>    
                <?php echo anchor('dashboard/editBooking/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png"  alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/deleteBooking/'.$book->id,'<img src="'.  base_url().'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>
                
            </td>  
            
        </tr>
            
    <?php           
    }
    }else
    {
        echo '<h3>Sorry no booking are made.</h3>';
    }
    ?>
        
    </table>
         
       <?php if (strlen($links) > 2) { ?>
        <div class="pagination">
            <?php echo $links; ?>
        </div>
    <?php } ?>    
     </div>
    
  </div>
    </div>