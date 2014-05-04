<script type="text/javascript">
  function changeFunc() {
   var selectBox = document.getElementById("selectBox");
   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   
   var dataString = 'id=' + selectedValue;
  // $a= dataString;
//alert($a);
  
$.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/get_hotel_id_for_booked_room' ;?>",
data: dataString,
success: function(msgs) 
      {
  
          $("#room_book").html(msgs);
          
      }
});
}

 </script>
<!-- ------------------calling currency_modify helper for currency--------------------------------- -->

<!-- ------------------finish calling currency_modify helper for currency--------------------------------- -->
<div id="right">
   
   <h2>Booking</h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
  <!-- hotel selection -->
  
 
   
<select name="selectMenu" style="width: 125px"  id="selectBox" onchange="changeFunc();">
            <option value="0" selected="selected"> Select Hotel                    
               </option>
              <?php
               foreach ($hotelName as $data)
               {
                   ?>
               <option value="<?php echo $data->id; ?>">
                   <?php echo $data->name; ?>
               </option>
                   <?php
               }
               ?>
         
           </select>