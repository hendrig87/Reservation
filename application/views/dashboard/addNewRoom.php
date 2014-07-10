

<!-- ------------------calling currency_modify helper for currency--------------------------------- -->
 
<!-- ------------------finish calling currency_modify helper for currency--------------------------------- -->
<div class="right">
    
    <h2>Add New Room&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/dashboard/roomInfo'; ?>">View Rooms</a></h2><hr class="topLine" />
   
   <!-- hotel selection -->
    <div id="sucessmsg"> 
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>

    <div id="form">
    <table>
    <tr>
        <?php echo form_open_multipart('dashboard/addRoom'); ?>
        <td id="alignright"> Room Type:</td>
        <td><input type="text" name="room_type" value="<?php echo set_value('room_type'); ?>" ></td>
       <!-- <td><a href="" class="example1 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    <tr>
        <td id="alignright"> No. of Rooms:</td>
        <td><input type="button" value="-" id="subs">&nbsp;<input type="text" style="width: 50px; color: black; text-align: center; margin: 0px;" class="onlyNumber" id="noOfRoom" value="1" name="noOfRoom" maxlength="3">&nbsp;<input type="button" value="+" id="adds"></td>
      <!--  <td><a href="" class="example2 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    <tr>
        <td id="alignright"> Price per room:</td>
        <td><input type="text" name="price" style="width: 205px; color: black;" class="onlyNumber" value="<?php echo set_value('price'); ?>" maxlength="4"></td>
       <!-- <td><a href="" class="example3 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    <tr>
        <td id="alignright"> Description:</td>
        <td><textarea name="description" value="<?php echo set_value('description'); ?>" ></textarea></td>
       <!-- <td><a href="" class="example4 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    <tr>
        <td id="alignright"> Images:</td>
        <td><input type="file" name="room_img" id="file" class="file" multiple></td>
       <!-- <td><a href="" class="example5 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    <tr>
        <td id="alignright"> To Hotel:</td>
        <td><select name="selectHotel"  id="selectBox" onchange="changeFunc();">
             <option> Select Hotel                    
                </option>
               <?php
                foreach ($hotelName as $data)
                {
                    ?>
                <option value="<?php echo $data->id; ?>">
                    <?php echo $data->name; ?>
                </option>
                    <?php
                }
                ?>
          
            </select></td>
       <!-- <td><a href="" class="example6 r" id="help" onclick="return false;" style="cursor: default;">?</a></td> -->
    </tr>
    
      <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="Add Room" name="submit" id="save">
              <input type="submit" value="Add Room & Continue" name="submits"></td>
              <?php form_close() ?>
          
    </tr>
</table>
    </div>
   
</div>
<div id="clear"></div>
</div>