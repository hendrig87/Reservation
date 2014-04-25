


<div id="login">

	<div id="body">
            
           <div class ="checkForm">
         <?php echo form_open_multipart('login/setpassword');?>
               <?php if(isset($_GET['resetPassword']))
               {
               $token = $_GET['resetPassword'];}
               else {  
               }
              
               $email= $this->dbmodel->get_user_email($token);
               foreach ($email as $data){
                   $useremail= $data->user_email;
               }
               // die($useremail);
               ?>
   
    <input type="hidden" name="userEmail" value="<?php echo $useremail; ?>" />
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
                        Confirm Password
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