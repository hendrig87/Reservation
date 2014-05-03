<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'contents/styles/pop-up-booking.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<table>
        	<tr>
                <td style="width:400px;">
                <fieldset>
                    <legend>Credit Card</legend>
                    <img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 150px; height: 100px;" >
                    
                <div class="input-prepend">
                <span class="add-on">Name in Card</span>
                <input class="input input-large" type="text" placeholder="Name in credit card" required="required" name="FullName" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Card Number</span>
                <input class="input input-large" type="text" placeholder="Credit card number" required="required" name="Address" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Security Number</span>
                <input class="input input-large" type="text" placeholder="Security Number" name="Occupation" >
                </div>
                
               
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Expiry Date</span>
                <input class="input input-large" type="text" placeholder="Security Number" required="required" name="Nationality" >
                </div>
               
            </fieldset>
            
              
                </td>
                <td  style="width:40px;"></td>
                <td style="width:400px;">
                <fieldset>
              <legend>Payment Method</legend>
              
              <img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 150px; height: 100px;" >
              <img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 150px; height: 100px;" >
              <img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 150px; height: 100px;" >
              <img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 150px; height: 100px;" >
              
            </fieldset>
            <button type="submit" class="btn btn-info">continue</button>
                </td>
            </tr>
        </table>