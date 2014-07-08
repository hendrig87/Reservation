


  <!-- hotel selection complete -->
    
  </div>
  <div id="right">
      <h2>Booking</h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
     <div id="room_book">
   <?php
    if(isset($roomInfo))
    { ?>
    <table width="100%">
        <tr>
            <th width="15%">Room</th>
            <th width="10%">No. of rooms</th>
            <th width="15%">From</th>
            <th width="15%">To</th>
            <th width="10%">No. of individuals</th>
            <th width="20%">Contact Person</th>
            <th width="15%">Contact Number</th>
            
    <?php
   
        foreach($roomInfo as $book)
    {
            $room = $book->room_type;
            $noOfRooms = $book->no_of_rooms_booked;
            $checkIn= $book->check_in_date;
            $checkOut = $book->check_out_date;
            $personalInfoId = $book->personal_info_id;
            
            
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $room; ?></div><br>  
                
                
            </td> 
            <td><?php echo $noOfRooms; ?></td>
            <td>
                <?php echo $checkIn; ?>
            </td>
            <td> <?php echo $checkOut; ?></td>
            
            <?php $personalInfo = $this->dashboard_model->get_booking_personal_info($personalInfoId);
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
       <td> <?php echo $bookingName."<br>". $bookingEmail; ?></td>
        <td> <?php echo $bookAddress."<br>".$contact ; ?></td>
        
    <?php }} ?>
  <!--          <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png" height="20px" width="20px" alt="Edit" id="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.jpg" height="20px" width="20px" alt="Delete" id="delete_room">'); ?>
                
            </td>  -->
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
     </div>
  </div>