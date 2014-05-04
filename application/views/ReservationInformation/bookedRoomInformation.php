


  <!-- hotel selection complete -->
    
    <?php
            $this->load->helper('currency'); 
            
?>
  
  
     <div id="room_book">
   <?php
    if(isset($roomInfo))
    { ?>
    <table width="100%">
        <tr>
            <th width="15%">Room</th>
            <th width="10%">No. of rooms</th>
            <th width="15%">From</th>
            <th width="15%">To</th>
            <th width="10%">No. of individuals</th>
            <th width="20%">Contact Person</th>
            <th width="15%">Contact Number</th>
            
    <?php
   
        foreach($roomInfo as $book)
    {
    ?>
            
        <tr>
            <td>
                <div style="float: left; margin-right: 10px;"></div>
               <div style="font-size: 16px;width: 60%; float: left;"><?php echo $book->room_type; ?></div><br>  
                
                
            </td> 
            <td><?php echo $book->no_of_rooms_booked; ?></td>
            <td>
                <?php echo $book->check_in_date; ?>
            </td>
            <td> <?php echo $book->check_out_date; ?></td>
             <td> <?php echo $book->check_out_date; ?></td>
            <?php
    if(isset($personalInfo))
    {        foreach ($personalInfo as $bookPerson) ?>
        <td> <?php echo $bookPerson->full_name; ?></td>
       
        <td> <?php echo $bookPerson->contact_no; ?></td>
        
    <?php } ?>
  <!--          <td>    
                <?php echo anchor('dashboard/edit/'.$book->id,'<img src="'.  base_url().'contents/images/edit.png" height="20px" width="20px" alt="Edit" id="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                <?php echo anchor('dashboard/delete/'.$book->id,'<img src="'.  base_url().'contents/images/delete.jpg" height="20px" width="20px" alt="Delete" id="delete_room">'); ?>
                
            </td>  -->
            
        </tr>
            
    <?php           
    }
    }
    ?>
        </tr>
    </table>
     </div>
</div>