
<div class="right">
    
    <h2>Add New Hotel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/hotels/hotelListing'; ?>">View Hotels</a></h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
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
        <td><input type="text" name="hotelName" value="<?php echo set_value('hotelName'); ?>" placeholder="Name of hotel" required /></td>
    </tr>
    
    <tr>
        <td id="alignright"> Address:</td>
        <td><input type="text" name="address" value="<?php echo set_value('address');  ?>" placeholder="Full address" required /></td> 
    </tr>
    <tr>
        <td id="alignright"> Contact No.:</td>
        <td><input type="text" name="contact" value="<?php echo set_value('contact'); ?>" placeholder="Contact number" required /></td>
    </tr>
   
      <tr>
          <td></td>
          <td><input type="submit" value="Add Hotel" name="submit" id="save"></td>
              <?php form_close() ?>
          
    </tr>
</table>
    </div>
   
</div>

</div>
<div id="clear"></div>