


  <!-- hotel selection complete -->
    
    <?php
            $this->load->helper('currency'); 
            
?>
  
  
     <div id="room_book">
    <?php
    if(isset($query))
    { ?>
    <table width="100%">
        <tr>
            <th width="25%">Room</th>
            <th width="30%">Facilities</th>
            <th width="15%">Price</th>
            <th width="10%">Available Rooms</th>
            <th width="10%">Action</th>
   <?php
        foreach($query as $book)
    {
            $roomName= $book->room_name;
            $totalRooms = $book->no_of_room;
            $roomDesc = $book->description;
            $hotel_id= $book->hotel_id;
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url().'uploads/'.$book->image; ?>" width="50px" height="50px"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $roomName; ?></div><br>  
                <div style="width: 100%;font-size: 12px;">( Total Rooms: <?php echo $totalRooms; ?> )</div>
                
            </td> 
            <td><?php echo $roomDesc; ?></td>
            <td>
                <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
            </td>
            <td> <?php echo $totalRooms; ?></td>
        
            <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png"  alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>
                
            </td>
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
     </div>
</div>