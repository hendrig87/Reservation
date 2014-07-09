 <?php
        $adultsNumber = 5;
        $children = 5;
        ?><div class="right">
<div id='ttoopp'>
    <h2>Documents</h2><hr style="display: block; height: 1px;
                          border: 0; border-top: 1px solid #ccc;
                          margin: 1em 0; padding: 0;">


    <h3>Reservation code API: Documentation</h3>

    <p>Using our API, you can create Your own code for online reservation system in your websites for hotels. The documents listed here are mainly targeted at application/web developers – but don’t let that scare you away in case you’re new to the subject. We’re pretty sure that using the API is rather straightforward, even for beginners.</p>

    <h3>Using the code</h3>
    <p>You can simply copy and paste the code as shown below to your website<strong> html</strong> code. </p>
</div>
<div id='code'>
<pre>
<code>
    <textarea readonly  style="border: none;background-color:white; min-height:400px; width: 930px; margin:  0px ; padding: 0px;">
    <div id="container">
      <h1>Welcome to Reservation</h1>
        <div id="body">
          <div class ="checkForm">
            <form method="post" action="#" id="checkin_room">
              <table>
                <tr>
                    <td class="tabledata">
                    <div class="input-prepend input-append">
                    <span class="add-on">Check In</span>
                    <input name="CheckIn" type="text" required="required" style="width:185px; 
                           cursor:pointer;" id="CheckIn" value="">      
                    </div> 
                    </td>
                    <td style="width:10px;"></td>
                    <td class="tabledata">
                    <div class="input-prepend input-append">
                    <span class="add-on">Adults</span> 
                    <select name="adults" id="adult" style="border-radius:0px 5px 5px 0px;">
                    <?php
                      for ($i = 1; $i <= $adultsNumber; $i++) {
                       echo "<option value=" . $i . ">" . $i . "</option>";
                      }
                    ?>
                    </select>
                    </div>
                    </td>
                    </tr>
                    <br/>
                    <tr>
                    <td class="tabledata">
                    <div class="clear"></div>
                    <div class="input-prepend input-append">
                    <span class="add-on">Check Out</span>
                    <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" 
                           required="required" id="CheckOut" value="">          
                    </div>
                    </td>
                    <td style="width:10px;"></td>
                    <td class="tabledata">
                    <div class="input-prepend input-append">
                    <span class="add-on">Children</span>
                    <select name="children" required id="child" style="border-radius:0px 5px 5px 0px;">
                    <?php
                      for ($i = 1; $i <= $children; $i++) {
                       echo "<option value=" . $i . ">" . $i . "</option>";
                      }
                    ?>
                    </select>
                    </div>
                    </td>
                    <td style="margin-top:-15px;">
                    <input type ="button" value="Submit" style="margin-top:-25px;" 
                           onclick="javascript:changeFunc();">
                    </td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>          
</textarea>
</code>         
</pre>




    </div>
<div id='bottom'>
<p>You can download necessary files here also. <a href="<?php echo base_url().'index.php/documentation/download/?download='.'test.js'; ?>" ><?php echo'Javascript file';   ?></a></p>

<h3>Using Package</h3>
<p>You can download necessary file from the download link. After completion of download include welcome_message.php file in your code and link to javascript files </p>




</div>
</div>
<div id="clear"></div>
</div>