<div class="right">
   <h2>API's&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/application/index'; ?>">Add New API</a></h2><hr class="topLine" />
   <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div> 
<div id="room_book" >
    <?php
    if (!empty($api)) {
        ?>
        <table width="100%" class="TFtable">
            <tr>
                <th> API ID</th>
                <th>API Name</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($api as $apps) {
                $id = $apps->id;
                $name = $apps->api_name;
                
                ?>

                <tr class="hoverChange">
                    <td><?php echo $id; ?> </td> 
                    <td><?php echo $name; ?></td>
                  
                    <td>    
                        <?php echo anchor('application/editApi/' . $apps->id, '<img src="' . base_url() . 'contents/images/edit.png" alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('application/deleteApi/' . $apps->id, '<img src="' . base_url() . 'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>

                    </td>

                </tr>

                <?php
            }
        }
        ?>

    </table>
</div>
</div>
<div class="clear"></div>
</div>
