<div class="right">
    
   <h2>Create New API&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/application/apiListing'; ?>">View All API's</a></h2><hr class="topLine" />
   
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
        <?php echo form_open_multipart('application/addApi'); ?>
        <td id="alignright"> API Name</td>
        <td><input type="text" name="api_name" value="<?php echo set_value('api_name'); ?>" ></td>
      
    </tr>
   <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="Create API" name="submit" id="save"></td>
              
              <?php form_close() ?>
          
    </tr>
    </table>
   
    
    </div>
   
</div>
<div id="clear"></div>
</div>