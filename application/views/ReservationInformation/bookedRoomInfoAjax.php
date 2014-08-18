 <div id="room_book">
   <?php
    if(!empty($roomInfo))
    { ?>
    <table width="100%" style="border-collapse: collapse">
        <tr>
            <th width="17%">Room</th>
            <th width="7%">No.of room</th>
           
            <th width="9%">From</th>
            <th width="9%">To</th>
            <th width="10%">Total Days</th>
            <th width="10%">Remain days</th>
            <th width="9%">No. of individuals</th>
            <th width="15%">Contact Person/ Address</th>
            <th width="10%">Contact Number</th>
             <th width="20%">Booked Hotel Info</th>
             <th width="4%">Action</th>
        </tr>  
    <?php
   
        foreach($roomInfo as $book)
    {
           // $room = $book->room_type;
            //$noOfRooms = $book->no_of_rooms_booked;
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
          <tr class="current" >
        <?php } else { ?>
       <tr class="upcomming">
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
            <td><?php if($days>1){ echo $days." days";}else{ echo $days." day";} ?></td>
            <td><?php if($remain>1){ echo $remain." days";}else{ echo $remain." day";} ?></td>
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
     <?php if (strlen($links) > 0) { ?>
        <div class="pagination">
            <?php echo $links; ?>
        </div>
    <?php } ?>
     
     </div>
      
</div>
</div>