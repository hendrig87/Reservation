
        
     <div id="login">
	<h1>Welcome to Online Reservation System</h1>

	<div id="body">
            <h3>Please fill the form below to register</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p>
           <div class ="checkForm">
        <?php echo form_open_multipart('login/register'); ?>
            <table style="text-align:center">
                <tr>
                    <td class="tabledata">
                        User name:
                    </td>
                    <td class="tabledata">
                        <input type="text" name="userName" class="textbox" placeholder="Username" required value="<?php echo ""; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        First name:
                    </td>
                    <td class="tabledata">
                       <input type="text" name="userFirstName" class="textbox" placeholder="First Name" required value="<?php echo ""; ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">
                        Last name:
                    </td>
                    <td class="tabledata">
                        <input type="text" name="userLastName" class="textbox" placeholder="Last Name" required value="<?php echo ""; ?>" />
                    </td>
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
                    <td colspan="2" >
                       <input type="submit" id="submitMe" value="Register" style="width: 160px;">
                    
     <!--                  <input type="submit" id="cancelMe" value="Cancel" style="width: 160px;" > -->
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
        </div>

	
</div>
   
        
        
        
  