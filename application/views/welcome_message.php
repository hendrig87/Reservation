<?php
        $adultsNumber = 5;
        $children = 5;
        ?>
<<<<<<< HEAD
<div id="container">
	<h1>Welcome to Online Reservation System</h1>
        <a href="http://localhost/reservation/index.php/login/registrationForm">Register</a>
        <a href="http://localhost/reservation/index.php/login/loginForm">Login</a>
        
	<div id="body">
	
           <div class ="checkForm">
        <form method ="post" action="checkout.php">
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

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
=======
    <?php $this->load->view('reservation_template'); ?>
>>>>>>> 2a805ba0c880c8f38c639e32393469bd14dbeb02

</body>
</html>