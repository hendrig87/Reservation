<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>

<script type="text/javascript">
$(document).ready(function(){

$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "search.php",
data: dataString,
cache: false,
success: function(html)
{

$("#display").html(html).show();
	
	
	}




});
}return false;    


});
});

jQuery(function($){
   $("#searchbox").Watermark("Search");
   });
</script>
<style type="text/css">
body
{
font-family:"Lucida Sans";

}
*
{
margin:0px
}
#searchbox
{
width:250px;
border:solid 1px #000;
padding:3px;
}
#display
{
width:250px;
display:none;
float:right; margin-right:30px;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
}

.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
#shade
{
background-color:#00CCFF;

}


</style>
</head>

<body>
<div  style=" padding:6px; height:23px; background:#3b5998; margin-left:15px; margin-right:15px; background:url(9lessons.png) left no-repeat #3b5998 ">
<div style="float:left; width:300px; font-size:12px; font-weight:bold; color:#FFFFFF; margin-left:150px; margin-top:6px"><a href="http://twitter.com/9lessons" style="color:#FFFFFF; text-decoration:none">Twitter</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/srinivas.tamada" style="color:#FFFFFF; text-decoration:none">Facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://feeds2.feedburner.com/9lesson" style="color:#FFFFFF; text-decoration:none">Feeds</a></div>
<div style=" width:300px; float:right; margin-right:30px" align="right">
<input type="text" class="search" id="searchbox" /><br />
<div id="display">
</div>

</div>

</div>
<div style="margin-top:20px; margin-left:20px">

<h3>Search Word " sri "</h3>
<br />
<br/>

<h4>More tutorials <a href="http://9lessons.blogspot.com" style="color:#993366">9lessons.blogspot.com</a> this tutorial <a href="http://9lessons.blogspot.com/2009/06/autosuggestion-with-jquery-ajax-and-php.html" style="color:#993366"> link</a> </h4>

</div>
</body>
</html>
