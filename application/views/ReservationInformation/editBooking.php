<div class="right">
    
    <h2>Edit Booking</h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>
  <?php
                $adultsNumber = 15;
                $children = 15;
                ?>  
    <input name="CheckIn" type="text" placeholder="From" required="required" id="fromDate" >



                <input name="CheckOut" type="text" placeholder="To"  value="" id="toDate"  required="required">



                <select name="adults" id="adults">
                    <?php
                    for ($i = 1; $i <= $adultsNumber; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <select name="children" required id="childs">
                    <option value="0" > Select no. of child</option>
                    <?php
                    for ($i = 1; $i <= $children; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
    
    
    
    
    
    
    
    
    </div>

</div>
<div id="clear"></div>