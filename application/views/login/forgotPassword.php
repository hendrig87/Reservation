<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/styles.css' ?>" />
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
         <link rel="stylesheet" href="/resources/demos/style.css" />
         <title>Online reservation | Reset Password</title>
 
</head>
<body>
      
     <div id="container">
	<h1>Welcome to Online Reservation System</h1>

	<div id="body">
            <h3>Please fill the form below to Reset Password</h3>
            <p id="sucessmsg">
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
              echo validation_errors(); ?> </p>
           <div class ="checkForm">
        <?php echo form_open_multipart('login/email'); ?>
            <table style="text-align:center">
                <tr>
                    <td class="tabledata">
                        Email:
                    </td>
                    <td class="tabledata">
                        <input type="text" name="userEmail" class="textbox" placeholder="Email" required />
                    </td>
                </tr>
                    
                <tr>
                    <td colspan="2" >
                       <input type="submit" id="submitMe" value="Reset Password" style="width: 300px; padding: 5px; font-size: 1em; margin: 0 auto;">
                    
     
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
        </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
   
        
        
        
    </body>
     
    
    
    
    
    
</body>