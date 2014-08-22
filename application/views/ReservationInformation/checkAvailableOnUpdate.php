
<script>
    var txtnext;
    txtnext = <?php echo $json . ';'; ?>;
  alert(txtnext);
    for (var i = 0; i < txtnext.length; i++) {
        txtnext[i].no_of_room = "0";
    }
    
    
    $(document).ready(function() {
        $('.available-room').change(function() {            //action performs when no of  rooms is selected

           // $("#disablebtnInfo").hide()                  //hides the information about disable button info.

            var rooms = $(this).val();
            
            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;
            $(this).parent().next('td').children('span.subTotal').text(total);
            calculateSum();
            
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
        
        
         $("#updatedBooking").click(function() {
       var updated_json = '<textarea  id="myjson" style="display:none;" >' + JSON.stringify(txtnext) + '</textarea>';
        $('#action').append(updated_json);
        alert(updated_json);
             var checkin = $("#fromDate").val();
             var checkout = $("#toDate").val();
             var adult = $("#adults").val();
             var child = $("#childs").val();
             var bookprimaryid= $("#hide").val();
             var hotelId= $("#hotelhide").val();
             alert(checkin);
                    $.ajax({
        type: "POST",
        url: "<?php echo base_url().'index.php/dashboard/updateBooking'; ?>",
        data: {
            'jsop': jsondata,
           'title': title
        },
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
$this->load->helper('currency'); ?>

    <h2>Update Booking</h2><hr class="topLine" />
    
  <?php
                $adultsNumber = 15;
                $children = 15;         
 
 //echo form_open_multipart('dashboard/updateBooking'); ?>
   
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
     <?php  if(!empty($room)){ ?>
    
    <table border="1px;" width="100%">
        <tr>
            <th>Room</th>
            <th width="40%">Facility</th>
            <th>Price</th>
            <th>Select No. Of Rooms</th>
            <th>Total Price</th>
        </tr>
       <?php  foreach ($room as $book)
        {    ?>
      <tr id="<?php echo $book->id; ?>"> <td>
                        <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $book->image; ?>" width="50px" height="50px"></div>
                        <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $book->room_name; ?></div><br>  


                    </td> 
                    <td><?php echo $book->description; ?></td>
                    <td>
        <?php get_currency($book->price); 
        ?>
                    </td>
                    <td> 
        <?php  
        check_available_room($abc['checkin'], $abc['checkout'], $book->room_name);
        ?>

                              

                    </td>

                    <td>    
                        <span>Rs.</span> <span class="subTotal">.00</span>
                    </td>

                </tr>

                <?php
             } ?>
            </table>
    
    <input type="submit" value="Update" id="updatedBooking" />
   
            <?php }else
        {
    echo '<h3>Sorry ! rooms are not available.</h3>';
        }
?>
    
    
    
    
    
    
    
    