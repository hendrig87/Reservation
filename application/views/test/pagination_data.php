<?php
//include('config.php');
$this->load->database();
$per_page = 9;
if($_GET)
{
$page=$_GET['page'];
}
//die('he');
$start = ($page-1)*$per_page;
$sql = "select * from booking_info order by id limit $start,$per_page";
$result = mysql_query($sql);
?>
<table width="800px">
<?php

while($row = mysql_fetch_array($result))
{
$msg_id=$row['id'];
$message=$row['booking_id'];
?>
<tr>
<td><?php echo $msg_id; ?></td>
<td><?php echo $message; ?></td>
</tr>
<?php
}
?>
</table>