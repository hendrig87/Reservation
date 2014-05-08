<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>

<script>
    
    $(document).ready(function(){
       
        
        
        
        //for displaying booked room
        var total = 0;

    var predata = '<table width="400px" style="padding-top:20px;" id="popuptbl">' +
            '<tr style="background:#e6e9f2;font-weight: bold;border-bottom:solid thin #CCCCCC;" >' +
            '<td style="width:35%;">Rooms</td>' +
            '<td style="width:20%;">Booked</td>' +
            '<td style="width:20%;">Price</td>' +
            '<td style="width:25%;">Sub-Total</td></tr>';
    var nextdata = "";
    for (var i = 0; i < txtnext.length; i++)
    {
        if (txtnext[i].no_of_room != 0)
        {
            nextdata += '<tr style="border-bottom:solid thin #CCCCCC;"><td><span id="room_name">' +
                    txtnext[i].room_name + '</span> </td><td><span id="booked_room">' +
                    txtnext[i].no_of_room + '</span> </td><td><span id="room_price">' +
                    txtnext[i].price + '</span></td><td><span id="sub_total">' + txtnext[i].no_of_room * txtnext[i].price + '</span></td></tr>';
        }

        total += (txtnext[i].no_of_room) * (txtnext[i].price);

    }

    var postdata = '<tr style="border-bottom:solid thin #CCCCCC;"><td colspan="3"><b>Total Price</b></td><td><div id="pi_total"><b>' + total + '<b></div></td></tr></table>';
    $('#table').html(predata + nextdata + postdata);
    
    
//end of code for diplaying booked room

$(".personalInfo").click(function() {

        $('#one').css({'background-color': '#999999'});
        $('.first').css({'color': 'black'});
        $('.first').css({'font-weight': 'normal'});
        $('#two').css({'background-color': '#999999'});
        $('.second').css({'color': 'black'});
        $('.second').css({'font-weight': 'normal'});
        $('#three').css({'background-color': '#0077b3'});
        $('.third').css({'color': '#0077b3'});
        $('.third').css({'font-weight': 'bold'});
        roomBook();
});

 });
    </script>


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
                        <?php form_open('popup/popupinsert') ?>
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
<?php form_close() ?>
    </div>
