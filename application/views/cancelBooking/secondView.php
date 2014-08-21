 <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
<script>
    
    $(document).ready(function() {
        $('#cancelBook').click(function() { 
         var code= $("#verificationCode").val(); 
         var valid = true;
        var msg = "Incomplete form, please fill the code";
       
        if ((code == null) || (code == "")) {
            $("#verificationCode").focus();
           // $("#bookId").style.border = "solid 1px red";          
            valid = false;
        }
       
         if (valid == false) {
            $("#msg").html(msg);
        }
        else {
            $.ajax({
        type: "POST",
        url: "<?php echo base_url().'index.php/cancel/cancelBooking'; ?>",
        data: {
            'code': code },
        success: function(msgs)
        {
            
            $("#replaceMe").html(msgs);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
        }
        
        
        
        
            
        });
    });
</script> 

<strong id="msg" style="color:#990000 ;"></strong>
<table>
        <tr>
            <td>verification Code: </td>
            <td><input type="text" required id="verificationCode" name="verificationCode" placeholder="Verification Code"/></td>
        </tr>
         
         <tr>
             <td></td>
             <td><input type="submit" value="Cancel Booking" id="cancelBook" /></td>
        </tr>
    </table>