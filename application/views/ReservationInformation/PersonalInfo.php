<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />

<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<table>
        	<tr>
                <td style="width:400px;">
                <fieldset>
            <legend>Reservation Information</legend>

                <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:212px; cursor:pointer; border-radius: 0px 5px 5px 0px;" id="CheckIn" value="">
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:212px; cursor:pointer; border-radius: 0px 5px 5px 0px;" required="required" id="CheckOut" value="">
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Room</span>
                <select name="Room" style="width:223px;">
                </select>
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">No. of Adults</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Adults" name="NoAdults" >
                </div>
                <div class="input-prepend">
                <span class="add-on">No. of Childs</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Childs" name="NoChild" >
                </div>
              
                </div>
                
            </fieldset>
            
                
                </td>
                <td  style="width:40px;"></td>
                <td style="width:400px;">
                <fieldset>
            <legend>Personal Information</legend>
                <div class="input-prepend">
                <span class="add-on">Full Name</span>
                <input class="input input-large" type="text" placeholder="Full Name" required="required" name="FullName" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Address</span>
                <input class="input input-large" type="text" placeholder="Full Address" required="required" name="Address" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Occupation</span>
                <input class="input input-large" type="text" placeholder="Occupation" name="Occupation" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Nationality</span>
                <input class="input input-large" type="text" placeholder="Nationality" required="required" name="Nationality" >
                </div>
                
                
                
                
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Contact No.</span>
                <input onkeypress='return isNumberKey(event)' class="input input-large" type="text" placeholder="Contact Number" required="required" name="ContactNumber" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Email</span>
                <input class="input input-large" type="text" placeholder="Email Address" required="required" name="Email" >
                </div>
            </fieldset>
                    <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;"></textarea>
            <button type="submit" >Make A Reservation</button>
                </td>
            </tr>
        </table>