
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
            $name= $data->api_name;
           
        }
    }
        ?>
    <table>
    <tr>
        <?php echo form_open_multipart('application/updateApi'); ?>
        <td id="alignright"> Name of hotel:</td>
        <td><input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="text" name="api_name" value="<?php echo $name; ?>" required /></td>
       
    </tr>  
      <tr>
          
          <td><input type="submit" value="Update" name="submit" id="save"></td>
              <?php form_close() ?>
          
    </tr>
</table>
    </div>
   
</div>

</div>
<div id="clear"></div>