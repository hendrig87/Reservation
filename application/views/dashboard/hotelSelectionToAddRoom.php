<script type="text/javascript">
   function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    
    var dataString = 'id=' + selectedValue;
   // $a= dataString;
 //alert($a);
   
 $.ajax({
type: "POST",
url: "<?php echo base_url().'index.php/dashboard/get_hotel_id' ;?>",
data: dataString,
 success: function(msgs) 
       {
   
           $("#room_book").html(msgs);
           
       }
});
}

  </script>
  
  
<div id="right">
    
    <h2>Add new Room</h2><hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;">
    
    <div id="sucess"> 
            <?php if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
    
    <select name="selectMenu" style="width: 125px"  id="selectBox" onchange="changeFunc();" required>
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