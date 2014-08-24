<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
 <script src="<?php echo base_url() . "contents/scripts/datepicker.js"; ?>"></script>
 

<?php $this->load->helper('availableroom');
$this->load->helper('currency'); ?>


<div class="right">
    
    <h2>Edit Booking</h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
  <?php
                $adultsNumber = 15;
                $children = 15;         
 if(!empty($query)){
                            foreach ($query as $data)
        {
            $checkInDate = $data-> check_in_date;
            $checkOutDate = $data-> check_out_date;
            $id= $data->id;
            $hotelId= $data->hotel_id;
          
        }
        
  if(!empty($book)){
      foreach ($book as $booker)
      {
          $adults= $booker->adult;
          $childs = $booker->child;
         
      }
  }  
 //echo form_open_multipart('dashboard/updateBooking'); ?>
    <input name="id" id="hide" type="hidden" value="<?php echo $id; ?>" />
    <input name="hotelid" id="hotelhide" type="hidden" value="<?php echo $hotelId; ?>" />
    <table>
        <tr>
            <td><span>Check In Date:</span></td>
            <td><input class="datepicker" oldval="<?php echo $checkInDate;  ?>" name="CheckIn" type="text" placeholder="From" required="required" id="fromDate" value="<?php echo $checkInDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Check Out Date:</span></td>
            <td><input class="datepicker" oldval="<?php echo $checkOutDate;  ?>" name="CheckOut" type="text" placeholder="To"  id="toDate"  required="required" value="<?php echo $checkOutDate; ?>" ></td>
        </tr>
        <tr>
            <td><span>Adults:</span></td>
            <td><select name="adults" id="adults" >
                    <option value="<?php echo $adults; ?>" selected="<?php echo $adults; ?>"><?php echo $adults; ?></option>
                    <?php
                    for ($i = 1; $i <= $adultsNumber; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td><span>Childs:</span></td>
            <td><select name="children" required id="childs">
                    <option value="0">Select</option>
                    <option value="<?php echo $childs; ?>" selected="<?php echo $childs; ?>"><?php echo $childs; ?></option>
                    <?php
                    for ($i = 0; $i <= $children; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
    </table>
    <br/>
    <h3>Booked room info</h3>
    <table width="100%" style="border-collapse: collapse">
        <tr style="border-bottom:1px solid #ccc; text-align: left;">
            <th width="20%">Room</th>
            <th width="40%">Facility</th>
            <th width="10%">Price</th>
            <th width="13%">Booked No. Of Rooms</th>
            <th width="7%">Total Price</th>
        </tr>
        <?php if(!empty($room)){
            $daa= array();
     foreach ($room as $data)
        { $roomName = $data->room_type;
        $noOfRooms = $data->no_of_rooms_booked;
        array_push($daa, $noOfRooms);
        $datasss=  json_encode($daa);
       
        $roomDetail = $this->dashboard_model->get_room_detail_by_room_name($roomName);
        foreach ($roomDetail as $roomInfo)
        {
            $roomId = $roomInfo->id;
            $roomNames= $roomInfo->room_name;
            $image = $roomInfo->image;
            $detail = $roomInfo->description;
            $price = $roomInfo->price;
            $totalRooms = $roomInfo->no_of_room;
        
        
        ?>
        <tr style="border-bottom:1px solid #ccc;" id="<?php echo $roomId; ?>">
       
            <td><div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' .$image; ?>" width="50px" height="50px"></div>
                    <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $roomNames; ?></div><br>  </td>
            <td><?php echo $detail;  ?></td>
             <td><?php get_currency($price) ;  ?></td>
             <td> <?php echo $noOfRooms; ?>
                   <?php //check_available_room_with_data( $checkInDate,  $checkOutDate, $roomNames, $noOfRooms); ?>
                </td>
                <td><?php 
        calculate_sum($noOfRooms,  $price);
        ?></td>
        </tr>
        <?php  } } } ?>
            </table>
    
    <input type="submit" value="Next" id="updateBooking" />
   
            <?php }else
        {
    echo '<h3>Sorry ! Edit not available.</h3>';
        }
?>
    
    
    
    
    
    
    
    </div>
<script>
   
$(document).ready(function() {
    
    var myStringArray = <?php echo $datasss; ?>;
    var txtnext;
    txtnext = <?php echo $json . ';'; ?>;
    for (var i = 0 ; i < txtnext.length; i++) {
       
        txtnext[i].no_of_room_booked = myStringArray[i];
    }
    
    
    
    
    
        $('.available-room').change(function() {            //action performs when no of  rooms is selected

           // $("#disablebtnInfo").hide()                  //hides the information about disable button info.

            var rooms = $(this).val();
            
            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            //calculateSum();
           


            // for updating the json data.
            var room_id;
            room_id =  $(this).parent().prev().prev().prev('td').parent().attr('id');
            var booked =  $(this).val();
          
            for (var i = 0; i < txtnext.length; i++) {
                if (txtnext[i].id == room_id) {
                    txtnext[i].no_of_room = booked;   
                    break;
                }
            }
        });
        
         $("#updateBooking").click(function() {
     
      var updated_json =  JSON.stringify(txtnext);
        $('#updateBooking').append(updated_json);
        
            var oldcheckin=  $("#fromDate").attr("oldval");
             var checkin = $("#fromDate").val();
             var oldcheckout = $("#toDate").attr("oldval");
             var checkout = $("#toDate").val();
             var adult = $("#adults").val();
             var child = $("#childs").val();
             var bookprimaryid= $("#hide").val();
             var hotelId= $("#hotelhide").val();
             
             //if date changed
             
           if(oldcheckin != checkin || oldcheckout != checkout)
            {
                $.ajax({
        type: "POST",
        url: "<?php echo base_url().'index.php/dashboard/checkAvailable'; ?>",
        data: {
            'checkin': checkin,
           'checkout': checkout,
           'adults': adult,
           'childs': child,
           'hotelId': hotelId
        },
        success: function(msgs)
        {
            $(".right").html(msgs);

        }
        
    });
            }
            else{
               $.ajax({
        type: "POST",
        url: "<?php echo base_url().'index.php/dashboard/checkRoomChange'; ?>",
        data: {
            'json': updated_json,
            'checkin': checkin,
           'checkout': checkout,
           'adults': adult,
           'childs': child,
           'hotelId': hotelId },
        success: function(msgs)
        {
           // alert(msgs);
             $(".right").html(msgs);

        }
        
    });
            }

    
         });
        
    });


</script>
</div>
<div id="clear"></div>