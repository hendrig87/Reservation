<?php
        $adultsNumber = 5;
        $children = 5;
        ?>
<div id="container">
	<div id="body">
	
           <div class ="checkForm">
        <form method ="post" action="http://salyani.com.np">
            <table>
                <tr>
                    <td class="tabledata">
                        Check In 
                    </td>
                    <td class="tabledata">
                        <input type="text" name="dfrom" id="datepicker1" placeholder="From" required value="<?php if (isset($fromDate)) {
            echo $fromDate;
        } else {
            echo "";
        } ?>" />
                    </td>
                    <td class="tabledata">
                        Adults 
                    </td>
                    <td class="tabledata">
                        <select name="adults">

                            <?php
                            for ($i = 1; $i <= $adultsNumber; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <br/>
                <tr>
                    <td class="tabledata">
                        Check Out
                    </td>
                    <td class="tabledata">
                        <input type="text" name="dto" id="datepicker2" placeholder="To" value="<?php if (isset($fromDate)) {
                                echo $fromDate;
                            } else {
                                echo "";
                                } ?>" required="true"/>
                    </td>
                    <td class="tabledata">
                        Children
                    </td>
                    <td class="tabledata">    
                        <select name="children" required>

                            <?php
                            for ($i = 1; $i <= $children; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td class="tabledata">
                        <input type ="submit" value="Submit" id ="submit">
                    </td>
            </table>
        </form>
        </div>
        </div>

	
</div>



<div id="booking">
    <div id="booking_title"></div>
    <div id="booking_contain"></div>
    <div id="booking_action"></div>
    
    
</div>
