<?php
$id = $_GET['resetPassword'];

//echo $id;
foreach ($query as $data){
                   $useremail= $data->user_email;
                   $userKey = $data->user_auth_key;
              }
?>

<?php if($id==$userKey){ ?>
<div id="login">

	<div class="body">
         <?php echo form_open_multipart('login/setpassword');?>
                  
    <input type="hidden" name="userEmail" value="<?php echo $useremail; ?>" />
            <table style="text-align:center">
               <tr>
                    <td ><h3>Reset Password</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    
                    <td class="tabledata">
                        <input type="password" class="textbox" name="user_pass" placeholder="New Password" id="newPassword" required/>
                    </td>
                </tr>
                <tr>
                    
                    <td class="tabledata">
                        <input type="password" class="textbox" name="user_confirm_pass" placeholder="Confirm Password" id="confirmPassword" required/>
                    </td>
                </tr>
                <tr>
                   
                    <td>
                       <input type="submit" id="submitMe" value="Reset" style="width: 280px; padding: 10px;">
                    </td>
                </tr>
  
  
  
   </table>
        <?php echo form_close(); ?>
    
    
    
        </div>
        </div>	
<?php }
 else { ?>
<div class="body">
    <label> Sorry your token has been expired! </label>
</div>
<?php }?>