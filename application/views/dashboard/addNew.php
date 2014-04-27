
<div id="right">
    <div><h2>Add new Room</h2></div>
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
        <?php echo form_open_multipart('dashboard/addRoom'); ?>
        <td> Room Type:</td>
        <td><input type="text" name="room_type"></td>
         <td><a href="" class="example1 r" id="help">?</a></td>
    </tr>
    <tr>
        <td> No. of room:</td>
        <td><input type="button" value="-" id="subs">&nbsp;<input type="text" style="width: 50px; color: black; text-align: center;" id="noOfRoom" value="1" name="noOfRoom">&nbsp;<input type="button" value="+" id="adds"></td>
        <td><a href="" class="example2 r" id="help">?</a></td>
    </tr>
    <tr>
        <td> Price:</td>
        <td><input type="text" name="price"></td>
        <td><a href="" class="example3 r" id="help">?</a></td>
    </tr>
    <tr>
        <td> Description:</td>
        <td><textarea name="description"></textarea></td>
        <td><a href="" class="example4 r" id="help">?</a></td>
    </tr>
    <tr>
        <td> Images:</td>
        <td><input type="file" name="room_img" id="file"></td>
        <td><a href="" class="example5 r" id="help">?</a></td>
    </tr>
      <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="Save" name="submit"><input type="button" value="Save & Continue"></td>
          <?php echo form_close(); ?>
    </tr>
</table>
    </div>
</div>
<div id="clear"></div>
</div>