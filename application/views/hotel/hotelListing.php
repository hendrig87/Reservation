


<!-- hotel selection complete -->


<div class="right">
   <h2>Hotels&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/hotels/index'; ?>">Add New Hotel</a></h2><hr class="topLine" />
   <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div> 
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
                        <?php echo anchor('hotels/editHotel/' . $hotel->id, '<img src="' . base_url() . 'contents/images/edit.png" height="20" width="20" alt="Edit" id="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('hotels/deleteHotel/' . $hotel->id, '<img src="' . base_url() . 'contents/images/delete.jpg" height="20" width="20" alt="Delete" id="delete_room">'); ?>

                    </td>

                </tr>

                <?php
            }
        }
        ?>

    </table>
</div>
</div>
</div>
<div class="clear"></div>