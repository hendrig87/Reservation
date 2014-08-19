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
                var_dump($query);
                var_dump($book);
                var_dump($room);
 if(!empty($query)){
                            foreach ($query as $data)
        {
            $checkInDate = $data-> check_in_date;
            $checkOutDate = $data-> check_out_date;
        }}
?>
    <table>
        <tr>
            <td><span>Check In Date:</span></td>
            <td><input name="CheckIn" type="text" placeholder="From" required="required" id="fromDate" value="<?php echo $checkInDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Check Out Date:</span></td>
            <td><input name="CheckOut" type="text" placeholder="To"  value="" id="toDate"  required="required" value="<?php echo $checkOutDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Adults:</span></td>
            <td><select name="adults" id="adults">
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
                    <option value="0" > Select no. of child</option>
                    <?php
                    for ($i = 1; $i <= $children; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <th>Room</th>
            <th>Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>
        <?php if(!empty($room)){
     foreach ($room as $data)
        { ?>
        <tr>
            <td><?php echo $data->room_type; ?></td>
        </tr>
        <?php   } } ?>
    </table>
    
    
    
    
    
    
    </div>

</div>
<div id="clear"></div>