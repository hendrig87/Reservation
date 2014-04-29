
        
     <div id="login">

	<div class="body">
            
          
        <?php echo form_open_multipart('login/register'); ?>
            <table >
               
                <tr>
                    <td><h3 style="text-align: center; margin: 0px; padding: 5px;">Sign up for Reservation </h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="text" name="userName" class="textbox" placeholder="Username" required value="<?php echo set_value('userName'); ?>" />
                    </td>
                </tr>
                <tr>
                   
                    <td>
                       <input type="text" name="userFirstName" class="textbox" placeholder="First Name" required value="<?php echo set_value('userFirstName'); ?>" /> 
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="text" name="userLastName" class="textbox" placeholder="Last Name" required value="<?php echo set_value('userLastName'); ?>" />
                    </td>
                </tr>
                <tr>
                   
                    <td>
                       <input type="email" name="userEmail" class="textbox" placeholder="Email" required value="<?php echo set_value('userEmail'); ?>" /> 
                    </td>
                </tr>
                <tr>
                   
                    <td>
                       <input type="password" name="userPass" class="textbox" placeholder="Password" required value="<?php echo ""; ?>" /> 
                    </td>
                </tr>    
                <tr>
                   
                    <td>
                       <input type="submit" id="submitMe" value="Sign Up" style="width: 275px; padding: 10px;">
                    
                  
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
        </div>

	
</div>
   
        
        
        
  