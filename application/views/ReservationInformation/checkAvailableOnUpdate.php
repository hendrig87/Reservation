<?php $this->load->helper('availableroom');
$this->load->helper('currency');   ?>
<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
<script>
    
    var txtnext;
    txtnext = <?php echo $json . ';'; ?>;
    for (var i = 0; i < txtnext.length; i++) {
        txtnext[i].no_of_room_booked = "0";
    }


    $(document).ready(function() {
         
        $('.available-room').change(function() {            //action performs when no of  rooms is selected
           
            $("#disablebtnInfo").hide();

            var rooms = $(this).val();

            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            // makeActiveLink();
        });

 $('body').on('click', 'img.add', function() {
     var room_id = $(this).parent().prev().prev().prev('td').parent().attr('id');
     var image = $(this).parent().prev().prev().prev().prev().prev('td').find('img').attr('src');
   var room_name = $(this).parent().prev().prev().prev().prev().prev('td').text();
   var desc = $(this).parent().prev().prev().prev().prev('td').text();
   var price = $(this).parent().prev().prev().prev('td').text();
   var roomprice = price.replace( /^\D+/g, '');;
   var rooms= $(this).parent().prev().prev('td').find('select').val();
   var total= 'Rs.'+ parseFloat(rooms * roomprice);  
    $("#disablebtnInfo").hide();

 var data ='<tr style="border-bottom:1px solid #ccc;" id="' + room_id + '"><input type="hidden" name="hidden[]" value="' + room_id + '" /><td><div style="float: left; margin-right: 10px;"><img src="'+ image + '" width="50px" height="50px"></div><div style="font-size: 16px;width: 60%; float: left;" id="room-name">' +
                        room_name + '</div><br></td><td>' +
                        desc + '</td><td>' +
                        roomprice + '</td><td><select name="selectMe[]" id="roomToBook" class="available-room" style="width: 80px;"><option>' +
                        rooms +'</option></td><td>' +
                        total +'</td><td><img class="remove" src="<?php echo base_url() . 'contents/images/subtract.png'; ?>" width="30" height="30"></td></tr>';
                
            if(rooms == 0){ 
                    $("#disablebtnInfo").html('<span class="error_sign">!</span>&nbsp;' + 'Please select the rooms & click +');
                $("#disablebtnInfo").fadeIn(1000);
            }
            else
            {
                $("#disablebtnInfo").hide();
                 makeActiveLink();
    $('#mytableID > tbody:last').append(data); 
   
   $(this).closest("tr").remove();}
 });
 
 $('body').on('click', 'img.remove', function() {
   var checkin = $("#fromDate").val();
   var checkout = $("#toDate").val();
   var room_id = $(this).parent().prev().prev().prev('td').parent().attr('id');
    var image = $(this).parent().prev().prev().prev().prev().prev('td').find('img').attr('src');
   var room_name = $(this).parent().prev().prev().prev().prev().prev('td').text();
   var desc = $(this).parent().prev().prev().prev().prev('td').text();
   var price = $(this).parent().prev().prev().prev('td').text();
   var roomprice = price.replace( /^\D+/g, '');;
   var rooms= $(this).parent().prev().prev('td').find('select').val();
   var total= 'Rs. 0.00';
   
   var data ='<tr style="border-bottom:1px solid #ccc;" id="' + room_id + '"><td><div style="float: left; margin-right: 10px;"><img src="' +image +'" width="50px" height="50px"></div><div style="font-size: 16px;width: 60%; float: left;" id="room-name">' +
                        room_name + '</div><br></td><td>' +
                        desc + '</td><td>' +
                        price + '</td><td>';
                var nextdata = '</td><td>' +
                        total +'</td><td><img class="add" src="<?php echo base_url() . 'contents/images/addition.png'; ?>" width="30" height="30"></td></tr>';
  
  //here ajax is called
  $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php/dashboard/checkroomshere'; ?>",
                data: {
                    'checkin': checkin,
        'checkout': checkout,
    'roomname': room_name},
                success: function(msgs)
                {
                   
                     $('#mytablelow > tbody:last').append(data + msgs + nextdata); 

                }

            });
   
   $(this).closest("tr").remove();
 });
 
 
        $("#updatedBooking").click(function(e) {
            if ($('#disablebtn').val() == 'yes')
            {
                e.preventDefault();
                $("#disablebtnInfo").html('<span class="error_sign">!</span>&nbsp;' + 'Please select the rooms & click +');
                $("#disablebtnInfo").fadeIn(1000);
                return false;
            }
            
        });

    });
</script> 


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

   <h4>Booked Room/s</h4>
   
<?php if (!empty($room)) {
    
           $ids1 = array();
foreach($room as $elem1)
    $ids1[] = $elem1->id;

$ids2 = array();
foreach($jsp as $elem2)
    $ids2[] = $elem2->id;

$uId = array_diff($ids1,$ids2);
$rooms = array();
foreach ($uId as $data){
    $room = $this->dashboard_model->get_room_info_by_room_id($data);
    $rooms = array_merge($rooms, $room);
}
foreach ($rooms as &$i) {
             $i->no_of_room_booked = "0";
        }
        unset($i);

    ?>

    <table id="mytableID" width="100%">
        <tbody>
        <tr style="border-bottom:1px solid #ccc; text-align: left;">
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
    <?php foreach($jsp as $ups)
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
                <input type="hidden" name="hidden[]" value="<?php echo $roomId; ?>" />
                    <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $image; ?>" width="50px" height="50px"></div>
                    <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $roomNames; ?></div><br>  


                </td> 
                <td><?php echo $detail; ?></td>
                <td>
                    <?php get_currency($price); ?>
                </td>
                <td> 
        <?php check_available_room_with_data_rooms( $abc['checkin'],  $abc['checkout'], $roomNames, $nnn); ?>

                </td>

                <td>    
                    <span>Rs.</span> <span class="subTotal"><?php calculate_sum($nnn,  $price); ?></span>
                </td>
                 <td><img class="remove" src="<?php echo base_url() . 'contents/images/subtract.png'; ?>" width="30" height="30"></td>
            </tr>
        </tbody>
<?php } ?>
            
    </table>
   
   <h4>Other Available Room/s</h4>
   <hr class="topLine" />
<!-- for other rooms -->
<?php if(!empty($rooms)){ ?>
    <table id="mytablelow" width="100%">
        <tr style="border-bottom:1px solid #ccc; text-align: left;">
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
    <?php foreach($rooms as $ups)
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
                <input type="hidden" name="hidden[]" value="<?php echo $roomId; ?>" />
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
                    <span>Rs.</span> <span class="subTotal"><?php calculate_sum($nnn,  $price); ?></span>
                </td>
                 <td><img class="add" src="<?php echo base_url() . 'contents/images/addition.png'; ?>" width="30" height="30"></td>
            </tr>
          
<?php }
}else{ ?> <table id="mytablelow" width="100%"><tbody><tr></tr></tbody></table>
   <?php echo '<h3>Sorry! Other rooms are unavailable.</h3>';
}
?>
    </table>
        <span id="disablebtnInfo"></span>
    <input type="hidden" name="disablebtn" id="disablebtn" value="yes"/>
    <input type="submit" value="Update" id="updatedBooking" />
<?php echo form_close(); ?>
<?php 
} else {
   echo '<h3>Sorry ! rooms are not available.</h3>';
}

    






