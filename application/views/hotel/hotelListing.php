


<!-- hotel selection complete -->

</div>
<div id="right">
    <h2>Hotels</h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
<div id="room_book" >
    <?php
    if (!empty($hotelName)) {
        ?>
        <table width="100%">
            <tr>
                <th width="25%">Name</th>
                <th width="30%">Address</th>
                <th width="15%">Contact No.</th>
<th width="10%">No. Of Rooms</th>
                <th width="10%">Action</th>
            </tr>
            <?php
            foreach ($hotelName as $hotel) {
                $id = $hotel->id;
                $name = $hotel->name;
                $address = $hotel->address;
                $contact = $hotel->contact;
                ?>

                <tr>
                    <td><?php echo $name; ?> </td> 
                    <td><?php echo $address; ?></td>
                    <td><?php echo $contact; ?></td>
                    
                    <?php $allrooms = 0;
                    $rooms = $this->dashboard_model->get_no_of_room($id);
                    foreach ($rooms as $data) {
                        $roomNo = $data->no_of_room; 
                    $allrooms= $allrooms + $roomNo;  }?>
                    
                    <td> <?php echo $allrooms; ?></td>
                   
                    <td>    
                        <?php echo anchor('dashboard/edit/' . $hotel->id, '<img src="' . base_url() . 'contents/images/edit.png" height="20px" width="20px" alt="Edit" id="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('dashboard/delete/' . $hotel->id, '<img src="' . base_url() . 'contents/images/delete.jpg" height="20px" width="20px" alt="Delete" id="delete_room">'); ?>

                    </td>

                </tr>

                <?php
            }
        }
        ?>

    </table>
</div>
</div>