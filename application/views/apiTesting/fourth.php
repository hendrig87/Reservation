<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
       <script src="<?php echo base_url() . "apiTesting/scripts/fourth.js"; ?>"></script>

        <?php
        $adultsNumber = 5;
        $children = 5;
        ?>
       <div id="reservation">
         
               <span class="error"><span class="error_sign">!</span> Invalid Date. Enter (yyyy/mm/dd) date format. </span>
               <form method="post" action="#" id="checkin_room">
                   
                 
                      <div class="input-prepend input-append">
               
                          <input name="CheckIn" placeholder="Check in date" type="text" required="required" style="width:205px; cursor:pointer;" id="CheckIn">
               
                </div> 
                   
                    
                  
                    
                   
                       
                   
                       <div class="clear"></div>
                <div class="input-prepend input-append">
                
                    <input name="CheckOut" placeholder="Check out date" type="text" style="width:205px; cursor:pointer;" id="CheckOut" value=""  required="required">
              
                </div>
                  
                         <div class="input-prepend input-append">
                             
                       
                             <select name="children" required id="child">
                                 <option value="0" > Guests</option>
                            <?php
                            for ($i = 1; $i <= $children; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                             </div>
                   
                       <input type="hidden" id="hotelId" value="My hotel added"/>
                       
                        <input type ="button" value="Check availability" class="checkinbtn" id="checkinbtn">
                      
                   
        </form>
               
             
        
               
        
       
</div>



<!-- ================================================================================================
=============================================================================================== -->

<!-- booking -->

<div class="popup" id="pop_up"style="display: none">
   
    <div>
        <div id="popupTitleBox" style="width:100%;">
            <span class="back" style="float:left;width:40%;text-align: left;">  <!--<a href="" id="back"> < </a>--></span>
        <span class="popupTitleText" style="float:left;width:10%;color: white;margin-top: 5px;">Booking</span>
        <span style="float:right;width:40%;text-align: right; color: white;"><a href="#" id="closePopup" > X </a></span>
    </div> 
    </div><br/>
    
    <div id="changePopup">
    <!-- Information from checkin - $abc -->
    <div id="path" style="display: none;">
    <hr id="nav">
    <div id="mainNav">
        
        <div class="number" id="one">1</div><span id="nav_description" class="first">Select Plan</span>
        <div class="number" id="two" style="margin-left: 18%;">2</div><span id="nav_description" class="second" style="left: -70px;">Booking Summary</span>
        <div class="number" id="three" style="margin-left: 18%;">3</div><span id="nav_description" class="third">Billing & Payments</span>
        <div class="number" id="four" style="margin-left: 10%;">4</div><span id="nav_description" class="fourth">Thank You</span>
    </div>
    <br/>
    <hr style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc; padding: 0; margin-top: 18px;">
    </div>
    
    <div id="loading"> <img width="30" src="<?php echo base_url()."contents/images/page-loader.gif" ; ?>" alt="loading.."/><br><b>Loading...</b></div>
    <div id="replaceMe">
        
    </div>
    </div>
    
</div>
 

<div class="middleLayer" style="display:none"></div>






<?php 
if(isset($xyz))
echo $xyz;

?>

  