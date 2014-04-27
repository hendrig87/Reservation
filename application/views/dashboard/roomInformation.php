<div id="right">
     <h3>Rooms</h3><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
     
     <div id="room_book">
    <table width="100%" border="1px">
        <tr>
            <th width="20%">Room</th>
            <th width="30%">Facilities</th>
            <th width="10%">Price</th>
            <th width="20%">Available Rooms</th>
            <th width="20%">Action</th>
    <?php
    if(isset($query))
    {
        foreach($query as $book)
    {
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url().'uploads/'.$book->image; ?>" width="50px" height="50px"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $book->room_name ?></div><br>  
                <div style="width: 100%;font-size: 12px;">( Total Rooms: <?php echo $book->no_of_room; ?> )</div>
                
            </td> 
            <td><?php echo $book->description; ?></td>
            <td><?php echo $book->price; ?></td>
            <td></td>
        
            <td>
                <?php form_open('dashboard/edit') ?>
                
                <a href="<?php echo base_url().'index.php/dashboard/edit'; ?>">Edit</a>
                <a href="<?php echo base_url().'index.php/dashboard/edit'; ?>">delete</a>
                
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