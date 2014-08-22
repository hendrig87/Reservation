<div class="right">
    
    <h2>Update Booking</h2><hr class="topLine" />
    
  <?php
                $adultsNumber = 15;
                $children = 15;         
 
 //echo form_open_multipart('dashboard/updateBooking'); ?>
   
    <input name="hotelid" id="hotelhide" type="hidden" value="<?php echo $abc['hotelId']; ?>" />
    <table>
        <tr>
            <td><span>Check In Date:</span></td>
            <td><input class="datepicker" name="CheckIn" type="text" placeholder="From" required="required"  id="fromDate" value="<?php echo $abc['checkin']; ?>" readonly ></td>
        </tr>
        <tr>
            <td><span>Check Out Date:</span></td>
            <td><input class="datepicker" name="CheckOut" type="text" placeholder="To"  id="toDate"  required="required" <?php echo $abc['checkout']; ?>" readonly ></td>
        </tr>
        <tr>
            <td><span>Adults:</span></td>
            <td><select name="adults" id="adults" >
                    <option value="<?php echo $abc['adult']; ?>" readonly selected="<?php echo $abc['adult']; ?>"><?php echo $abc['adult']; ?></option>
                    
                </select></td>
        </tr>
        <tr>
            <td><span>Childs:</span></td>
            <td><select name="childs" id="childs" >
                    <option value="<?php echo $abc['child']; ?>" readonly selected="<?php echo $abc['child']; ?>"><?php echo $abc['child']; ?></option>
                    
                </select></td>
        </tr>
    </table>
     <?php
        $room = $this->dashboard_model->get_rooms_by_hotel_id($abc['hotelId']);
        
        if(!empty($room)){
     foreach ($room as $book)
        {    ?>
    <table border="1px;" width="100%">
        <tr>
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>
       
      <tr id="<?php echo $book->id; ?>"> <td>
                        <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $book->image; ?>" width="50px" height="50px"></div>
                        <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $book->room_name; ?></div><br>  


                    </td> 
                    <td><?php echo $book->description; ?></td>
                    <td>
        <?php get_currency($book->price); //======  <!-- Sending price of room to currency_helper -->
        ?>
                    </td>
                    <td> 
        <?php //$available_room = $book->no_of_room; 
        check_available_room($abc['checkin'], $abc['checkout'], $book->room_name);
        ?>

                               <!-- <select class="available-room" style="width: 80px;" id="roomToBook">
                                    <option value="0">Select</option>
                        <?php
                        // for ($i = 1; $i <= $available_room; $i++) {
                        //    echo "<option value=" . $i . ">" . $i . "</option>";
                        // }
                        ?>

                                </select> -->

                    </td>

                    <td>    
                        <span>Rs.</span> <span class="subTotal">.00</span>
                    </td>

                </tr>

                <?php
             } ?>
            </table>
    
    <input type="submit" value="Updatess" id="updateBooking" />
   
            <?php }else
        {
    echo '<h3>Sorry ! rooms are not available.</h3>';
        }
?>
    
    
    
    
    
    
    
    </div>

</div>
<div id="clear"></div>