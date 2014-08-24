<?php
$hid = $_POST['hotel'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
//die($hid);
foreach ($uid as $id) {
                $u_id = $id->id;
            }
$per_page = 9;
$this->load->database();
//Calculating no of pages
if($hid==0){
  $sql = "select * from booking_info where user_id".$u_id; 
  //redirect('dashboard/bookingInfo');
}
else{
$sql = "select * from booking_info where hotel_id=".$hid." AND user_id=".$u_id;
}
//$sql = "select * from booking_info where hotel_id=".$hid;
$result = mysql_query($sql);
$count = mysql_num_rows($result);
$pages = ceil($count/$per_page);
//include_once 'pagination_data.php';
?>

<script type="text/javascript" src="http://localhost/t/aa/jquery-1.11.1.min.js"></script>

<script>
$(document).ready(function()
{ 
var url = "http://localhost/t/";
//alert('here');
//Display Loading Image
function Display_Load()
{
$("#loading").fadeIn(900,0);
//$("#loading").html("<img src="bigLoader.gif" />");
}
//Hide Loading Image
function Hide_Load()
{
$("#loading").fadeOut('slow');
};

//Default Starting Page Results
$("#pagination li:first")
.css({'color' : '#FF0084'}).css({'border' : 'none'});
Display_Load();
//alert('here');
 var i = <?php echo $hid; ?>;
 $.ajax({
type: "GET",
url: "<?php echo base_url().'index.php/dashboard/pagination?page=1' ;?>",
data: {
     'i' : i
    },
success: function(msgs) 
      {
  
          $("#content").html(msgs);
          Hide_Load()
      }
});

//$("#content").load("pagination_data.php?page=1", Hide_Load());

//Pagination Click
$("#pagination li").click(function(){
Display_Load();
//CSS Styles
$("#pagination li")
.css({'border' : 'solid #dddddd 1px'})
.css({'color' : '#0063DC'});

$(this)
.css({'color' : '#FF0084'})
.css({'border' : 'none'});

//Loading Data
var pageNum = this.id;
 $.ajax({
type: "GET",
url: "<?php echo base_url().'index.php/dashboard/pagination?page=' ;?>"+pageNum,
data: {
     'i' : i
    },
success: function(msgs) 
      {
  
          $("#content").html(msgs);
          Hide_Load()
      }
});
//$("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
});

});
</script>
<style>
#loading
{
width: 100%;
position: absolute;
}
li
{
list-style: none;
float: left;
margin-right: 16px;
padding:5px;
border:solid 1px red;
color:#0063DC;
}
li:hover
{
color:#FF0084;
cursor: pointer;
}
</style>

<div id="loading" ></div>
<div id="content" ></div>
<ul id="pagination">
<?php
//var_dump($page);
//Pagination Numbers
for($i=1; $i<=$pages; $i++)
{
echo '<li id="'.$i.'">'.$i.'</li>';
}
?>
</ul>