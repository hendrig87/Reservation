
        
     <div id="login">

	<div class="body">
            
           <div class ="checkForm">
        <?php echo form_open_multipart('login/register'); ?>
            <table >
               
                <tr>
                    <td colspan="2"><h3>Sign up for Reservation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="myButton" href="<?Php echo base_url().'index.php/welcome/index' ?>" >X</a></h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    <td class="tabledata">
                        User name:
                    </td>
                    <td class="tabledata">
                        <input type="text" name="userName" class="textbox" placeholder="Username" required value="<?php echo set_value('userName'); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        First name:
                    </td>
                    <td class="tabledata">
                       <input type="text" name="userFirstName" class="textbox" placeholder="First Name" required value="<?php echo set_value('userFirstName'); ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        Last name:
                    </td>
                    <td class="tabledata">
                        <input type="text" name="userLastName" class="textbox" placeholder="Last Name" required value="<?php echo set_value('userLastName'); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        Email:
                    </td>
                    <td class="tabledata">
                       <input type="email" name="userEmail" class="textbox" placeholder="Email" required value="<?php echo set_value('userEmail'); ?>" /> 
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
                       <input type="submit" id="submitMe" value="Sign Up" style="width: 280px; padding: 10px;">
                    
     <!--                  <input type="submit" id="cancelMe" value="Cancel" style="width: 160px;" > -->
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
        </div>

	
</div>
   
        
        
        
  