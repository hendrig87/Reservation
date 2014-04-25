<div id="login">

	<div id="body">
            
           <div class ="checkForm">
        <?php echo form_open_multipart('login/validate_user'); ?>
            <table style="text-align:center">
               <tr>
                    <td colspan="2"><h3>Log in to Reservation</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    <td class="tabledata">
                        Email:
                    </td>
                    <td class="tabledata">
                        <input type="email" name="userEmail" class="textbox" placeholder="Email" required value="<?php echo ""; ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td class="tabledata">
                        Password:
                    </td>
                    <td class="tabledata">
                       <input type="password" name="userPass" class="textbox" placeholder="Password" required value="<?php echo ""; ?>" /> 
                    </td>
                </tr>    
                <tr>
                    <td ></td>
                    <td>
                       <input type="submit" id="submitMe" value="Login" style="width: 280px; padding: 10px;">
                    
     <!--                  <input type="submit" id="cancelMe" value="Cancel" style="width: 160px;" > -->
                    </td>
                </tr>
               <tr>
                        <td>
                            <input type="checkbox" value="1" name="checkMe"/>Stay Logged In
                           
                        </td>
                        <td>
                            <a href="forgotPassword">Forgot Password ?</a>
                        </td>
               </tr> 
            </table>
        </form>
        </div>
        </div>	
</div>
   
        
        
        
    