
<script>
    
    var txtnext;
    txtnext = <?php echo $js_on . ';'; ?>;

    for (var i = 0; i < txtnext.length; i++) {
        txtnext[i].no_of_room_booked = "0";
    }


    $(document).ready(function() {
        $('.available-room').change(function() {            //action performs when no of  rooms is selected

            var rooms = $(this).val();

            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            calculateSum();

            // for updating the json data.
            var room_id;
            
            room_id = $(this).parent().prev().prev().prev('td').parent().attr('id');
            alert(room_id);
            var booked = $(this).val();
            
            for (var i = 0; i < txtnext.length; i++) {
                if (txtnext[i].id == room_id) {
                    txtnext[i].no_of_room_booked = booked;

                    break;
                }
            }



        });


        $("#updatedBooking").click(function() {
            var updated_json = JSON.stringify(txtnext);
            $('#updatedBooking').append(updated_json);

            var checkin = $("#fromDate").val();
            var checkout = $("#toDate").val();
            var adult = $("#adults").val();
            var child = $("#childs").val();
            var bookprimaryid = $("#hide").val();
            var hotelId = $("#hotelhide").val();
            alert(checkin);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php/dashboard/updateBooking'; ?>",
                data: {
                    'json': updated_json},
                success: function(msgs)
                {
                    alert(msgs);
                    //$("#room_book").html(msgs);

                }

            });

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


<input name="hotelid" id="hotelhide" type="hidden" value="<?php echo $abc['hotelId']; ?>" />
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
<?php if (!empty($update)) { ?>

    <table width="100%">
        <tr style="border-bottom:1px solid #ccc; text-align: left;">
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>
    <?php foreach($update as $ups)
{  
            $nnn= $ups->no_of_room_booked;
            $roomId = $ups->id;
            $roomNames= $ups->room_name;
            $image = $ups->image;
            $detail = $ups->description;
            $price = $ups->price;
            $totalRooms = $ups->no_of_room;
            
            ?>
        <tr style="border-bottom:1px solid #ccc;" id="<?php echo $roomId; ?>"> <td>
                    <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $image; ?>" width="50px" height="50px"></div>
                    <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $roomNames; ?></div><br>  


                </td> 
                <td><?php echo $detail; ?></td>
                <td>
                    <?php get_currency($price); ?>
                </td>
                <td> 
        <?php check_available_room_with_data( $abc['checkin'],  $abc['checkout'], $roomNames, $nnn); ?>

                </td>

                <td>    
                    <span>Rs.</span> <span class="subTotal">.00</span>
                </td>

            </tr>
<?php } ?>
    </table>

    <input type="submit" value="Update" id="updatedBooking" />

<?php 
} else {
   echo '<h3>Sorry ! rooms are not available.</h3>';
}

    






