
<div class="right">
    
    <h2>Edit &nbsp;<a href="<?php echo base_url().'index.php/dashboard/addNewRoomForm'; ?>">Add New Room</a></h2><hr class="topLine" />
   
    
    <div id="sucess"> 
            <?php if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
    <div id="form">
       
        
    <table>
    <tr>
        <?php echo form_open_multipart('dashboard/update'); ?>
         <?php 
        foreach($query as $edit)
        {
        ?>
        <td id="alignright"> Room Type:</td>
        <td><input type="text" name="room_type" required="required" value="<?php echo $edit->room_name; ?>"></td>
      <!-- <td><label class="example1 r" id="help">?</label></td> -->
    </tr>
    <tr>
        <td id="alignright"> No. of Rooms:</td>
        <td><input type="button" value="-" id="subs">&nbsp;<input type="text" style="width: 50px; color: black; text-align: center; margin: 0px;" id="noOfRoom" name="noOfRoom" value="<?php echo $edit->no_of_room; ?>">&nbsp;<input type="button" value="+" id="adds"></td>
       <!-- <td><label class="example2 r" id="help">?</label></td> -->
    </tr>
    <tr>
        <td id="alignright"> Price:</td>
        <td><input type="text" name="price" style="width: 205px; color: black;" value="<?php echo $edit->price; ?>"></td>
       <!-- <td><label class="example3 r" id="help">?</label></td> -->
    </tr>
    <tr>
        <td id="alignright"> Description:</td>
        <td><textarea name="description"  style="height: 100px;width: 205px;resize: none;"><?php echo $edit->description; ?></textarea></td>
       <!-- <td><label class="example4 r" id="help">?</label></td> -->
    </tr>
    <tr>
        <td id="alignright"> Images:</td>
        <td><img src="<?php echo base_url().'uploads/'.$edit->image; ?>" width="50px" height="50px"><input type="file" name="room_img" id="file" required="required" multiple></td>
       <!-- <td><label class="example5 r" id="help">?</label></td> -->
    </tr>
      <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" value="<?php echo $edit->id; ?>" name="id"><input type="submit" value="Update" name="submit"></a></td>
          <?php echo form_close(); ?>
    </tr>
</table>
        <?php
        }
        ?>
    </div>
</div>
</div>