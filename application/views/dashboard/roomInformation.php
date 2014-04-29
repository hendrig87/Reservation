<!-- ------------------calling currency_modify helper for currency--------------------------------- -->
 <?php
            $this->load->helper('currency'); 
            
?>
<!-- ------------------finish calling currency_modify helper for currency--------------------------------- -->
<div id="right">
    
    <h2>Rooms&nbsp;<a href="<?php echo base_url().'index.php/dashboard/addNewRoomForm'; ?>">Add New Room</a></h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
     
     <div id="room_book">
    <table width="100%">
        <tr>
            <th width="25%">Room</th>
            <th width="30%">Facilities</th>
            <th width="15%">Price</th>
            <th width="20%">Available Rooms</th>
            <th width="10%">Action</th>
    <?php
    if(isset($query))
    {
        foreach($query as $book)
    {
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url().'uploads/'.$book->image; ?>" width="50px" height="50px"></div>
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