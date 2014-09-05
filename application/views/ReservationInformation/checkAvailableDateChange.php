<script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
<script>
    
    var txtnext;
    txtnext = <?php echo $json . ';'; ?>;

    for (var i = 0; i < txtnext.length; i++) {
        txtnext[i].no_of_room_booked = "0";
    }

    $(document).ready(function() {
         makeActiveLink();
        $('.available-room').change(function() {            //action performs when no of  rooms is selected

                $("#disablebtnInfo").hide();

            var rooms = $(this).val();

            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            $(this).parent().next('td').children('input.val').val(total);
            calculateSum();
            makeActiveLink();
        });


        $("#updatedBooking").click(function(e) {
            
           if ($('#disablebtn').val() == 'yes')
            {
                e.preventDefault();
                $("#disablebtnInfo").html('<span class="error_sign">!</span>&nbsp;' + 'Please select the rooms');
                $("#disablebtnInfo").fadeIn(1000);
                return false;
            }  
        });
    });
</script>
<?php $this->load->helper('availableroom');
$this->load->helper('currency');
?>

<h2>Update Booking</h2><hr class="topLine" />

<?php $adultsNumber = 15;
$children = 15;
?>

<?php echo form_open_multipart('dashboard/updateBooking'); ?>
<input name="hotelid" id="hotelhide" type="hidden" value="<?php echo $abc['hotelId']; ?>" />
<input name="id" id="id" type="hidden" value="<?php echo $abc['id']; ?>" />
<table>
    <tr>
        <td><span>Check In Date:</span></td>
        <td><input class="datepicker" name="CheckIn" type="text" placeholder="From" required="required"  id="fromDate" value="<?php echo $abc['checkin']; ?>" readonly ></td>
    </tr>
    <tr>
        <td><span>Check Out Date:</span></td>
        <td><input class="datepicker" name="CheckOut" type="text" placeholder="To"  id="toDate"  required="required" value="<?php echo $abc['checkout']; ?>" readonly ></td>
    </tr>
    <tr>
        <td><span>Adults:</span></td>
        <td><select name="adults" id="adults" >
                <option value="<?php echo $abc['adult']; ?>" readonly selected="<?php echo $abc['adult']; ?>"><?php echo $abc['adult']; ?></option>

            </select></td>
    </tr>
    <tr>
        <td><span>Childs:</span></td>
        <td><select name="childs" id="childs" >
                <option value="<?php echo $abc['child']; ?>" readonly selected="<?php echo $abc['child']; ?>"><?php echo $abc['child']; ?></option>

            </select></td>
    </tr>
</table>

<h4>Available Rooms from same hotel</h4>
    <table width="100%">
        <tr style="border-bottom:1px solid #ccc; text-align: left;">
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>

    <?php 
    foreach ($room as $book){
            
       
        ?>
            <tr style="border-bottom:1px solid #ccc;" id="<?php echo $book->id; ?>"> <td>
                    <input type="hidden" name="hidden[]" value="<?php echo $book->id; ?>" />
                    <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $book->image; ?>" width="50px" height="50px"></div>
                    <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $book->room_name; ?></div><br>  


                </td> 
                <td><?php echo $book->description; ?></td>
                <td>
                    <?php get_currency($book->price); ?>
                </td>
                <td> 
        <?php check_available_room_user($abc['checkin'], $abc['checkout'], $book->room_name); ?>

                </td>

                <td>    
                    <span>Rs.</span> <span class="subTotal">.00</span>
                    <input type="hidden" class="val" name="subtotal[]" value="0" />
                </td>

            </tr>

<?php } ?>
            <tr>
            <td colspan="3" style="text-align:right;"><td><b>Total</b></td>
            <td><span>Rs.</span>
                <span id="total_price">.00</span></td>
        </tr>
    </table>
       <span id="disablebtnInfo"></span>
        <input type="hidden" name="disablebtn" id="disablebtn" value="yes"/>
    <input type="submit" value="Update" id="updatedBooking" />
<?php echo form_close(); ?>
