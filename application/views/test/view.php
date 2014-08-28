<?php //
$hid = $_POST['hotel'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];

?>

<<<<<<< HEAD

=======
<!--<script type="text/javascript" src="http://localhost/t/aa/jquery-1.11.1.min.js"></script> -->
>>>>>>> origin/master

<script>
$(document).ready(function()
{ 
<<<<<<< HEAD
var url = "<?php echo base_url(); ?>";
=======
var url = "http://localhost/reservation/";
>>>>>>> origin/master
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
  var checkin = '<?php echo $checkIn; ?>';
   var checkout = '<?php echo $checkOut; ?>';
   //alert (checkin);
 $.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/pagination?page=1' ;?>",
data: {
     'i' : i,
     'hotel':i,
     'checkin':checkin,
     'checkout':checkout
    },
success: function(msgs) 
      {
  
          $("#content").html(msgs);
          Hide_Load()
      }
});



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
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/pagination?page=' ;?>"+pageNum,
data: {
     'i' : i,
     'hotel':i,
     'checkin':checkin,
   'checkout':checkout
    },
success: function(msgs) 
      {
  
          $("#content").html(msgs);
          Hide_Load()
      }
});

});

});
</script>
<style>
    ul#pagination{
       margin:4px 0; padding:0px; overflow:hidden; font:12px 'Tahoma'; list-style-type:none;
        
    }
    
li.ajax_pagination
{
list-style: none;
float: left;
margin-right: 16px;
padding:5px;
border:solid 1px black ;
color:#0063DC;

}
li.ajax_pagination:hover
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
echo '<li class="ajax_pagination" id="'.$i.'">'.$i.'</li>';
}
?>
</ul>