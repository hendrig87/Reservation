<script type="text/javascript">
  function changeFunc() {
   var selectBox = document.getElementById("selectBox");
   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   
   var dataString = 'id=' + selectedValue;
  // $a= dataString;
//alert($a);
  
$.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/ajax_get_hotel_id' ;?>",
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
<div class="right">
   
   <h2>Rooms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/dashboard/addNewRoomForm'; ?>">Add New Room</a></h2><hr class="topLine" />
   
  <!-- hotel selection -->
  
 
   
<select name="selectMenu"  id="selectBox" onchange="changeFunc();">
            <option value="0" selected="selected"> All Hotels                    
               </option>
              <?php if(!empty($hotelName)){
               foreach ($hotelName as $data)
               {
                   ?>
               <option value="<?php echo $data->id; ?>">
                   <?php echo $data->name; ?>
               </option>
                   <?php
              }}
               ?>
         
           </select>
  


  <!-- hotel selection complete -->
    
    <?php
            $this->load->helper('currency'); 
            
?>
  
  
     <div id="room_book">
    <?php
    if(isset($query))
    { ?>
    <table width="100%" class="TFtable" style="border-collapse: collapse;">
        <tr>
            <th width="25%">Room</th>
            <th width="30%">Facilities</th>
            <th width="10%">Price</th>
            <th width="10%">Total Rooms</th>
            <th width="12%">Related Hotel</th>
             <th width="10%">Action</th>
   <?php
        foreach($query as $book)
    {
            $roomName= $book->room_name;
            $totalRooms = $book->no_of_room;
            $roomDesc = $book->description;
            $hotel_id= $book->hotel_id;
            $hotelData= $this->dashboard_model->get_hotel_data_by_id($hotel_id);
            foreach($hotelData as $hotels)
    {
            $hotelName= $hotels->name;
           
    ?>
            
        <tr class="hoverChange">
            <td>
                <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url().'uploads/thumb_'.$book->image; ?>" width="50px" height="50px"></div>
               <h3 style="float: left; margin: 0px;"><?php echo $roomName; ?></h3><br/>  
                <p style="float: left; margin: 0px;">( Total Rooms: <?php echo $totalRooms; ?> )</p>
                
            </td> 
            <td><?php echo $roomDesc; ?></td>
            <td>
                <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
            </td>
            <td> <?php echo $totalRooms; ?></td>
         <td> <?php echo $hotelName; ?></td>
            <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png"  alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>
                
            </td>
            
        </tr>
            
    <?php           
    }
    }
    }
    ?>
        </tr>
    </table>
         <?php if (strlen($links) > 2) { ?>
        <div class="pagination">
            <?php echo $links; ?>
        </div>
    <?php } ?>
     </div>
  
</div>
