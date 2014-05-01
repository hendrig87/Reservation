<script type="text/javascript">
   function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    
    var dataString = 'hotel_id=' + selectedValue;
    $a= dataString;
 //alert($a);
   
  $.ajax({
  type: "POST",
  url: "<?php echo base_url().'index.php/hotels/get_hotel_id' ;?>",
  data: dataString,
   success: function(msg) 
         {
            
             $("#hotel").html(msg);
         }
  
    
  });
   }

  </script>
    
<select name="selectMenu" style="width: 125px"  id="selectBox" onchange="changeFunc();">
             <option value="0" selected="selected"> Select Hotel                    
                </option>
               <?php
                foreach ($hotelName as $data)
                {
                    ?>
                <option value="<?php echo $data->id; ?>">
                    <?php echo $data->name; ?>
                </option>
                    <?php
                }
                ?>
          
            </select>


  <div id="hotel">
      <?php if(isset($id))
          echo $id;
          ?>
     
  </div>