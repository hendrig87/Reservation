<script src="http://code.jquery.com/jquery-1.9.1.js"></script>   
<link rel="stylesheet" href="<?php echo base_url()."contents/styles/jquery.tinytooltip.css";?>"/>
    <script src="<?php echo base_url()."contents/jquery/dashboard.js";?>"></script>
<link rel="stylesheet" href="<?php echo base_url()."contents/styles/dashboardStyle.css";?>"/>
    <script src="<?php echo base_url()."contents/jquery/jquery.tinytooltip.js";?>"</script>
      <script src="<?php echo base_url()."contents/jquery/jquery.tinytooltip.min.js";?>"</script>
<?php 
$navigation_menu=array('Add new room', 'Calender', 'Booking');

?>
<div id="full">
<div id="left">
<div id="navigation">
    
    <?php
    foreach($navigation_menu as $menu)
    {
    ?>
        
    <ul><li><div id="menu"><?php echo $menu; ?></div></li></ul>
    
    <?php    
        }
    ?>
</div>
</div>
    