<script type="text/javascript">
  function changeFunc() {
   var selectBox = document.getElementById("selectBox");
   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   var checkIn=$("#checkin").val();
   var checkOut=$("#checkout").val();
   
   
 
  
$.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/searchManagedBooking' ;?>",
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
           
          <input type="text" class="datepicker" id="checkin">
          <input type="text" class="datepicker" id="checkout">
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
          <input type="submit" value="Search" onclick="changeFunc()" />
         
      </div> 
      
     <div id="room_book">
   <?php
    if(!empty($roomInfo))
    { ?>
    <table width="100%">
        <tr>
            <th width="10%">Room</th>
            <th width="7%">No. of rooms</th>
            <th width="10%">From</th>
            <th width="10%">To</th>
            <th width="9%">No. of individuals</th>
            <th width="22%">Contact Person/ Address</th>
            <th width="10%">Contact Number</th>
             <th width="20%">Booked Hotel Info</th>
             <th width="4%">Action</th>
        </tr>  
    <?php
   
        foreach($roomInfo as $book)
    {
            $room = $book->room_type;
            $noOfRooms = $book->no_of_rooms_booked;
            $checkIn= $book->check_in_date;
            $checkOut = $book->check_out_date;
            $bookingId= $book->booking_id;
            $hotelId = $book->hotel_id;
            
            
    ?>
            
        <tr>
            <td>
                
               <?php echo $room; ?>  
                
                
            </td> 
            <td><?php echo $noOfRooms; ?></td>
            <td>
                <?php echo $checkIn; ?>
            </td>
            <td> <?php echo $checkOut; ?></td>
            
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
        <td> <?php echo $totalPupil; ?></td>
        <td> <?php echo $bookingName."<br>". $bookingEmail."<br>".$bookAddress; ?></td>
        <td> <?php echo $contact ; ?></td>
        
        
    <?php }} ?>
        <?php $hotelInfo = $this->dashboard_model->get_hotel_info($hotelId);
        if(!empty($hotelInfo))
    {        foreach ($hotelInfo as $bookHotel){
        $hotelName= $bookHotel->name;
        $hotelAddress = $bookHotel->address;
        $contact = $bookHotel->contact;
    
        ?>
        <td><?php echo $hotelName."<br>". $hotelAddress."<br>".$contact;  ?></td> <?php }} else{ ?><td><?php echo 'hotel not found';  ?></td><?php } ?>
   <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png"  alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>
                
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
     </div>
  </div>
    </div>