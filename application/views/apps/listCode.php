<div class="right">
   <h2>Code Info</h2><hr class="topLine" />
   <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div> 
<div id="room_book" >
    <?php
    if (!empty($code)) {
        ?>
        <table width="100%" class="TFtable">
            <tr>
                <th width="20%"> API ID</th>
                <th width="20%">API Title</th>
                <th width="20%">Hotel</th>
                <th width="40%">Code</th>
            </tr>
            <?php
            foreach ($code as $allCodes) {
                $apiId = $allCodes->api_id;
                $apiTitle = $allCodes->title;
                $hotelName = $allCodes->hotel_id;
                $code = $allCodes->code;
                
                ?>

                <tr class="hoverChange">
                    <td><?php echo $apiId; ?> </td> 
                    <td><?php echo $apiTitle; ?></td>
                   <td><?php echo $hotelName; ?> </td> 
                    <td><?php echo $code; ?></td>

                </tr>

                <?php
            }
        }
        ?>

    </table>
</div>
</div>
<div class="clear"></div>
</div>
