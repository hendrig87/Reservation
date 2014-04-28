<div id="login">

	<div class="body">
            
           <div class ="checkForm">
        <?php echo form_open_multipart('login/validate_user'); ?>
            <table >
                
               <tr>
                    <td colspan="2"><h3>Log in to Reservation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="myButton" href="<?Php echo base_url().'index.php/welcome/index' ?>" >X</a></h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    <td class="tabledata">
                        Email
                    </td>
                    <td class="tabledata">
                        <input type="email" name="userEmail" class="textbox" placeholder="Email" required value="<?php echo set_value('userEmail') ; ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td class="tabledata">
                        Password
                    </td>
                    <td class="tabledata">
                       <input type="password" name="userPass" class="textbox" placeholder="Password" required value="<?php echo ''; ?>" /> 
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
                         <div style="font-size: 10px;" ><input type="checkbox" value="1" name="checkMe" />Stay Logged In</div>
                           
                        </td>
                        <td>
                           <div style="font-size: 12px; text-align: right;" > <a href="forgotPassword" >Forgot Password ?</a></div>
                        </td>
               </tr> 
            </table>
        </form>
        </div>
        </div>	
</div>
   
        
        
        
    