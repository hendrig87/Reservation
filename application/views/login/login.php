     <div id="login">
	<h1>Welcome to Online Reservation System</h1>

	<div id="body">
            <h3>Please fill the form below to login</h3>
            <p id="sucessmsg">
                                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
                                echo validation_errors(); ?> </p>
           <div class ="checkForm">
        <?php echo form_open_multipart('login/validate_user'); ?>
            <table style="text-align:center">
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
                    <td></td>
                    <td >
                       <input type="submit" id="submitMe" value="Login" style="width: 280px; padding: 5px; font-size: 1.5em; margin: 0 auto;">
                    
     
                    </td>
                </tr>
               <tr>
                        <td>
                            <input type="checkbox" value="1" name="checkMe"/>Stay Logged In
                           
                        </td>
                        <td>
                            <a href="forgotPassword">Forgot Password</a>
                        </td>
               </tr> 
            </table>
        </form>
        </div>
        </div>	
</div>
   
        
        
        
    