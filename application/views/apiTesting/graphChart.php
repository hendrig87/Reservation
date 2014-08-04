<div class="right">
    


    <table border="2" cellpadding="5" width="50%">
        <tr>
            <th>Hotel</th>
             <th>visitors</th>
        </tr>
        <?php if(!empty($test)){
 foreach ($test as $data){
     $hotel= $data->hotel_name;
     $visitors = $data->no_of_visitors; ?>
        <tr><td><?php echo $hotel; ?></td>
            <td><?php echo $visitors; ?></td></tr>
   
    <?php  }
}
?>
   </table>  
    
</div>
<div id="clear"></div>
</div>