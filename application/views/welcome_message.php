<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Online Reservation System</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
        input
        {
            padding: 5px;
            min-width: 20px;
        }
        select
        {
            width: 100px;
            padding: 5px;
        }
        
        .checkForm
        
        {
            font-weight:bold;
            font-size: 18px;
              
        }
        
        
	</style>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <script>
            $(function() {
                $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });

            });
            $(function() {
                $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });
            });

        </script>
</head>
<body>
<?php
        $adultsNumber = 5;
        $children = 5;
        ?>
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

</body>
</html>