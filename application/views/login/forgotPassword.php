<div id="login">

	<div class="body">
            
           <div class ="checkForm">
        <?php echo form_open_multipart('login/email'); ?>
            <table style="text-align:center">
                <tr>
                    <td><h3 style="text-align: center; margin: 0px; padding: 5px;">Forgot Password</h3>
                        <h5 style="text-align: center; margin: 0px; padding: 5px;">Enter your email below and instructions to reset your password will be emailed to you:</h5>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    
                    <td >
                        <input type="text" name="userEmail" class="textbox" placeholder="Email" required />
                    </td>
                </tr>
                    
                <tr>
                   
                    <td>
                       <input type="submit" id="submitMe" value="Reset Password" style="width: 275px; padding: 10px;">
                    
     
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
        </div>

	
</div>
 
        
        
        
   