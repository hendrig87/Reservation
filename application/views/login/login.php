<!dcotype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/styles.css' ?>" />
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
         <link rel="stylesheet" href="/resources/demos/style.css" />
         <title>Online reservation | Login</title>
    </head>
    
    <body>
        
     <div id="container">
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
                        <input type="email" name="userName" class="textbox" placeholder="Email" required value="<?php echo ""; ?>" />
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
                       <input type="submit" id="submitMe" value="Login" style="width: 300px; padding: 5px; font-size: 1.5em; margin: 0 auto;">
                    
     
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

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
   
        
        
        
    </body>
    
</html>