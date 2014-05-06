<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'contents/styles/test.css'; ?> " />
<script src="<?php echo base_url() . 'contents/scripts/test.js' ?>"></script>

<div id="room_book">

 <div id="pi_booking_summary">
                        <legend id="booking_summary_title">Booking Summary</legend> 
                        <div id="table"></div>                  
</div>

                         
        <table>
            <tr>
                
                <td id="vertical_line"></td>
                <td style="width:400px;float: left;">
                    <fieldset style="margin-left:50px;">
                        <legend id="booking_summary_title">Personal Information</legend>
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
                        <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;"></textarea>
                    </fieldset>


                </td>
            </tr>
        </table>
        <div id="action">
            <input type="submit" value="Next" id="popupBtn" class="personalInfo" style="margin-bottom: 10px;">
        </div>

    </div>
