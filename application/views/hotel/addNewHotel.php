
<div id="right">
    
    <h2>Add new Hotel</h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
    
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
        <?php echo form_open_multipart('hotels/addNewHotel'); ?>
        <td id="alignright"> Name of hotel:</td>
        <td><input type="text" name="hotelName" value="<?php echo set_value('hotelName'); ?>" required /></td>
        <td><a href="" class="help1 r" id="help" onclick="return false;" style="cursor: default;">?</a></td>
    </tr>
    
    <tr>
        <td id="alignright"> Address</td>
        <td><input type="text" name="address" value="<?php echo set_value('address'); ?>" required /></td>
        <td><a href="" class="help2 r" id="help" onclick="return false;" style="cursor: default;">?</a></td>
    </tr>
    <tr>
        <td id="alignright"> Contact No.</td>
        <td><input type="text" name="contact" value="<?php echo set_value('contact'); ?>" required /></td>
        <td><a href="" class="help3 r" id="help" onclick="return false;" style="cursor: default;">?</a></td>
    </tr>
   
      <tr>
          <td></td>
          <td><input type="submit" value="Save" name="submit" id="save"></td>
              <?php form_close() ?>
          
    </tr>
</table>
    </div>
   
</div>
<div id="clear"></div>
</div>