<div class="right">
   <h2>User Info</h2><hr class="topLine" />
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
    if (!empty($users)) {
        ?>
        <table width="100%">
            <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Last Login Date</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($users as $userData) {
                $name = $userData->user_name;
                $fname = $userData->user_fname;
                $lname = $userData->user_lname;
                $email = $userData->user_email;
                $login = $userData->Last_login_date;
                
                ?>

                <tr>
                    <td><?php echo $name; ?> </td> 
                    <td><?php echo  $fname." ".$lname; ?></td>
                    <td><?php echo $email; ?> </td> 
                    <td><?php echo $login; ?> </td> 
                    
                   
                    <td>    
                        <?php echo anchor('user/editUser/' . $userData->id, '<img src="' . base_url() . 'contents/images/edit.png" alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('user/deleteUser/' . $userData->id, '<img src="' . base_url() . 'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>

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
