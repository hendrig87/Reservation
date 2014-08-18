<div id="loginOnHover" style="display: none; position: absolute; left: 1009px;
     top: 49px; min-height: 100px; z-index: 1" onMouseOver="show_loginForm()" onMouseOut="hide_loginForm()" >
<div id="loginHover">

	<div class="body">
            
           
        <?php echo form_open_multipart('login/validate_user'); ?>
            <table >
                
               <tr>
                   <td  ><h3 style="text-align: center; margin: 0px; padding: 5px;">Log in</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p></td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="userEmail" class="textbox" placeholder="Email" required value="<?php echo set_value('userEmail') ; ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                       <input type="password" name="userPass" class="textbox" placeholder="Password" required value="<?php echo ''; ?>" /> 
                    </td>
                </tr>    
                <tr>
                    <td>
                       <input type="submit" id="submitMe" value="Login" style="width: 265px; padding: 5px; ">
                    </td>
                </tr>
               <tr>
                        <td>
                         <div style="font-size: 10px;" ><input type="checkbox" value="1" name="checkMe" />Stay Logged In                  
                         
                         
                         </div>
                        </td>
               </tr> 
            </table>
        </form>
        
        </div>	
</div>
</div>
   
        
        
        
    