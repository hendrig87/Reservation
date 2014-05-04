


  <!-- hotel selection complete -->
    
    <?php
            $this->load->helper('currency'); 
            
?>
  
  
     <div id="room_book">
   <?php
    if(isset($query))
    { ?>
    <table id="tbl" width="100%">
        <tr>
            <th width="15%">Room</th>
            <th width="10%">No. of rooms</th>
            <th width="15%">From</th>
            <th width="15%">To</th>
            <th width="10%">No. of individuals</th>
            <th width="20%">Contact Person</th>
            <th width="15%">Contact Number</th>
            
    <?php
   
        foreach($query as $book)
    {
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $book->room_name; ?></div><br>  
                <div style="width: 100%;font-size: 12px;">( Total Rooms: <?php echo $book->no_of_room; ?> )</div>
                
            </td> 
            <td><?php echo $book->description; ?></td>
            <td>
                <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
            </td>
            <td> we be displayed after booking completed</td>
        
            <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png" height="20px" width="20px" alt="Edit" id="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.jpg" height="20px" width="20px" alt="Delete" id="delete_room">'); ?>
                
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