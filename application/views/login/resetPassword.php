


<div id="login">

	<div id="body">
            
           <div class ="checkForm">
         <?php echo form_open_multipart('login/setpassword');?>
               <?php $token = $_GET['resetPassword']; ?>
    <input type="hidden" name="tokenid" value="<?php echo $token; ?>" />
    
            <table style="text-align:center">
               <tr>
                    <td colspan="2"><h3>Reset Password</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    <td class="tabledata">
                        New Password
                    </td>
                    <td class="tabledata">
                        <input type="password" class="textbox" name="user_pass" placeholder="New Password" id="newPassword" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        New Password
                    </td>
                    <td class="tabledata">
                        <input type="password" class="textbox" name="user_confirm_pass" placeholder="Confirm Password" id="confirmPassword" required/>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td>
                       <input type="submit" id="submitMe" value="Reset" style="width: 280px; padding: 10px;">
                    </td>
                </tr>
  
  
  
   </table>
        <?php echo form_close(); ?>
        </div>
        </div>	
</div>