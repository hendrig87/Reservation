<div id="right">
     <h3>Booking</h3><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
    <table>
        <tr>
            <td>Room</td>
            <td>Price</td>
            <td>No. of Room</td>
            <td>Total Price</td>
    <?php
    if(isset($query))
    {
        foreach($query as $book)
    {
    ?>
            
        <tr>
            <td>
                 <img src="<?php echo base_url().'uploads/'.$book->image; ?>" width="100px" height="100px">
            <?php
            echo $book->room_name; 
            ?>
              </td> 
            <td><?php echo $book->no_of_room; ?></td>
            <td><?php echo $book->price; ?></td>
            <td><?php echo $book->description; ?></td>
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
    
</div>