<?php //
$hid = $_POST['hotel'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];

?>
<script>
$(document).ready(function()
{ 

var url = "<?php echo base_url(); ?>";

//alert('here');
//Display Loading Image


//Default Starting Page Results
$("#pagination li:first")
.css({'color' : '#474747'}).css({'border-radius' : '3px'});
//Display_Load();
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
         // Hide_Load()
      }
});



//Pagination Click
$("#pagination li").click(function(){
//Display_Load();
//CSS Styles
$("#pagination li")
.css({'border-radius' : '3px'})
.css({'color' : '#474747'});

$(this)
.css({'color' : '#474747'})
.css({'background':'#FFFFFF'})
.css({'border-radius' : '3px'});

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
         // Hide_Load()
      }
});

});

});
</script>
<style type="text/css">
	.TFtable{
		width:100%; 
		border-collapse:collapse; 
	}
	.TFtable td{ 
		padding:7px; border:#4e95f4 1px solid;
                border: 0px;
	}
	/* provide some minimal visual accomodation for IE8 and below */
	.TFtable tr{
		background: #b8d1f3;
	}
	/*  Define the background color for all the ODD background rows  */
	.TFtable tr:nth-child(odd){ 
		background: #b8d1f3;
	}
	/*  Define the background color for all the EVEN background rows  */
	.TFtable tr:nth-child(even){
		background: #dae5f4;
	}

   
     </style>
<style>
    ul#pagination{
       margin:4px 0; padding:0px; overflow:hidden; font:12px 'Tahoma'; list-style-type:none;
        
    }
    
li.ajax_pagination
{
list-style: none;
float: left;
margin-right: 16px;

border:solid 1px  ;

color:#474747;
border:solid 1px #B6B6B6;
padding:6px 9px 6px 9px;
background:#E6E6E6;
background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6));
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;

}
li.ajax_pagination:hover
{
color:#474747;
cursor: pointer;
}
::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
</style>

<div id="loading" ></div>
<div id="content" ></div>

<ul id="pagination">
<?php
//var_dump($pages);
//Pagination Numbers

if($pages!=1 && $pages!=0){
   // echo '<li class="ajax_pagination" id="1">First</li>';
for($i=1; $i<=$pages; $i++)
{
echo '<li class="ajax_pagination" id="'.$i.'">'.$i.'</li>';
}
echo '<li class="ajax_pagination" id="'.$pages.'">Last</li>';
}
?>
</ul>