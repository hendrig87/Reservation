<script>
$(document).ready(function() {
        makeActiveLink();
        $('.available-room').change(function() {            //action performs when no of  rooms is selected

            $("#disablebtnInfo").hide()                  //hides the information about disable button info.

            var rooms = $(this).val();
            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            calculateSum();
            makeActiveLink();


            // for updating the json data.
            var room_id;
            room_id = $(this).parent().prev().prev().prev('td').parent().attr('id');
            var booked = $(this).val();
            for (var i = 0; i < txtnext.length; i++) {
                if (txtnext[i].id == room_id) {
                    txtnext[i].no_of_room = booked;
                    break;
                }
            }
        });
    });


</script>

<?php $this->load->helper('availableroom');
$this->load->helper('currency'); ?>


<div class="right">
    
    <h2>Edit Booking</h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
  <?php
                $adultsNumber = 15;
                $children = 15;
               
 if(!empty($query)){
                            foreach ($query as $data)
        {
            $checkInDate = $data-> check_in_date;
            $checkOutDate = $data-> check_out_date;
            $id= $data->id;
          
        }
        
  if(!empty($book)){
      foreach ($book as $booker)
      {
          $adults= $booker->adult;
          $childs = $booker->child;
         
      }
  }  
 echo form_open_multipart('dashboard/updateBooking'); ?>
    <input name="id" type="hidden" value="<?php echo $id; ?>" />
    <table>
        <tr>
            <td><span>Check In Date:</span></td>
            <td><input name="CheckIn" type="text" placeholder="From" required="required" id="fromDate" value="<?php echo $checkInDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Check Out Date:</span></td>
            <td><input name="CheckOut" type="text" placeholder="To"  id="toDate"  required="required" value="<?php echo $checkOutDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Adults:</span></td>
            <td><select name="adults" id="adults" >
                    <option value="<?php echo $adults; ?>" selected="<?php echo $adults; ?>"><?php echo $adults; ?></option>
                    <?php
                    for ($i = 1; $i <= $adultsNumber; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td><span>Childs:</span></td>
            <td><select name="children" required id="childs">
                    <option value="0">Select</option>
                    <option value="<?php echo $childs; ?>" selected="<?php echo $childs; ?>"><?php echo $childs; ?></option>
                    <?php
                    for ($i = 0; $i <= $children; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
    </table>
    <table border="1px;" width="100%">
        <tr>
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>
        <?php if(!empty($room)){
     foreach ($room as $data)
        { $roomName = $data->room_type;
        $noOfRooms = $data->no_of_rooms_booked;
        $roomDetail = $this->dashboard_model->get_room_detail_by_room_name($roomName);
        foreach ($roomDetail as $roomInfo)
        {
            $roomId = $roomInfo->id;
            $roomNames= $roomInfo->room_name;
            $detail = $roomInfo->description;
            $price = $roomInfo->price;
            $totalRooms = $roomInfo->no_of_room;
        
        
        ?>
        <tr style="text-align: center;">
        <input type="hidden" name="roomId" value="<?php echo $roomId; ?>" />
            <td><?php echo $roomNames;  ?></td>
            <td><?php echo $detail;  ?></td>
             <td><?php get_currency($price) ;  ?></td>
             <td><!--<select style="width: 70px;" name="rooms" required id="rooms">
                     <option value="0">Select</option>
                     <option value="<?php //echo $noOfRooms; ?>" selected="<?php //echo $noOfRooms; ?>"><?php //echo $noOfRooms; ?></option>-->
                   <?php //$available_room = $book->no_of_room; 
        check_available_room( $checkInDate,  $checkOutDate, $roomNames);
        ?>
                <!--</select>--></td>
                <td></td>
        </tr>
        <?php  } } }?>
            </table>
    
    <input type="submit" value="Update" />
    <?php echo form_close(); ?>
            <?php }else
        {
    echo '<h3>Sorry ! Edit not available.</h3>';
        }
?>
    
    
    
    
    
    
    
    </div>

</div>
<div id="clear"></div>