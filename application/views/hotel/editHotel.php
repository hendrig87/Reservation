
<div class="right">
    
    <h2>Edit Hotel</h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
    <div id="form">
         <?php
    if (!empty($query)) {
        foreach ($query as $data){
            $id= $data->id;
            $name= $data->name;
            $address= $data->address;
            $contact= $data->contact;
        }
    }
        ?>
    <table>
    <tr>
        <?php echo form_open_multipart('hotels/updateHotel'); ?>
        <td id="alignright"> Name of hotel:</td>
        <td><input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="text" name="hotelName" value="<?php echo $name; ?>" required /></td>
        <td><a href="" class="help1 r" id="help" onclick="return false;" style="cursor: default;">?</a></td>
    </tr>
    
    <tr>
        <td id="alignright"> Address</td>
        <td><input type="text" name="address" value="<?php echo $address ?>" required /></td>
        <td><a href="" class="help2 r" id="help" onclick="return false;" style="cursor: default;">?</a></td>
    </tr>
    <tr>
        <td id="alignright"> Contact No.</td>
        <td><input type="text" name="contact" value="<?php echo $contact; ?>" required /></td>
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

</div>
<div id="clear"></div>