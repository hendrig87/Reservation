<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
<script>
    
    $(document).ready(function() {
        $('#cancelNext').click(function() { 
         var id= $("#bookId").val();
         var email = $("#email").val();
         var valid = true;
        var msg = "Incomplete form, please fill the form correctly";
       
        if ((id == null) || (id == "")) {
            $("#bookId").focus();         
            valid = false;
        }
        
        if ((email == null) || (email == "") || (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/))) {        
            $("#email").focus();          
            valid = false;
        }
       
         if (valid == false) {
            $("#msg").html(msg);
        }
        else {
            $.ajax({
        type: "POST",
        url: "<?php echo base_url().'index.php/cancel/postBooking'; ?>",
        data: {
            'bookingId': id,
            'email': email },
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
 <strong id="replaceMe" style="color:#990000 ;"> 
     <table>
        <tr>
            <td>Booking Id: </td>
            <td><input type="text" required id="bookId" name="bookId" placeholder="Booking Id"/></td>
        </tr>
         <tr>
            <td>Email: </td>
            <td><input type="email" required id="email" name="email" placeholder="Email"/></td>
        </tr>
         <tr>
             <td></td>
             <td><input type="submit" value="Next" id="cancelNext"/></td>
        </tr>
    </table>
    
   
    
    </strong> 
