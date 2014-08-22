<?php
//include('config.php');

$per_page = 9;
if($_GET)
{
$page=$_GET['page'];
$id = $_GET['i'];
}

//die($id);
//die('he');
$start = ($page-1)*$per_page;
if($id==0){
  $sql = "select * from booking_info limit $start,$per_page"; 
  //redirect('dashboard/bookingInfo');
}
else{
$sql = "select * from booking_info where hotel_id= $id  limit $start,$per_page";
}
$result = mysql_query($sql);
?>
<table width="100%" style="border-collapse: collapse">
    <tr>
            <th width="17%">Room</th>
            <th width="7%">No. of room</th>
           
            <th width="12%">From - To</th>
            <th width="10%">Remain days</th>
            <th width="9%">No. of Pupil</th>
            <th width="25%">Contact Person/ Address</th>
             <th width="15%">Booked Hotel</th>
             <th width="4%">Action</th>
        </tr> 
<?php

while($row = mysql_fetch_array($result))
{
$b_id=$row['id'];
$bookingId=$row['booking_id'];

$checkIn = $row['check_in_date'];
$checkOut = $row['check_out_date'];
 $days = floor( ( strtotime( $checkOut ) - strtotime(  $checkIn ) ) / 86400 );
?>
    
<tr>
<td>
 <?php
  $bookedRoomInfo= $this->dashboard_model->get_all_booked_room_info($bookingId);
 foreach ($bookedRoomInfo as $bookedRooms){
             $room= $bookedRooms->room_type;
             $noOfRooms = $bookedRooms->no_of_rooms_booked; ?>
        
                
        <?php echo $room;?> <br/> <?php }?> </td>
<td> <?php foreach ($bookedRoomInfo as $bookedRooms){
             $room= $bookedRooms->room_type;
             $noOfRooms = $bookedRooms->no_of_rooms_booked; ?>
        
                
        <?php echo $noOfRooms;?> <br/> <?php }?> </td>

 <td>
                <?php echo $checkIn.' to '.$checkOut.'<br/>('.$days.' days)'; ?>
 </td>
 
 <td></td>
 <td></td>
 <td></td>
 <td></td>
<td>     <?php echo anchor('dashboard/editBooking/'.$b_id,'<img src="'.  base_url().'contents/images/edit.png"  alt="Edit" class="edit_room">'); ?>&nbsp;&nbsp;&nbsp;
         <?php echo anchor('dashboard/deleteBooking/'.$b_id,'<img src="'.  base_url().'contents/images/delete.png" alt="Delete" class="delete_room">'); ?>
                
</td> 
</tr>
<?php
}
?>
</table>