<script src="<?php echo base_url() . "contents/scripts/room_booking.js"; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'contents/styles/pop-up-booking.css'; ?>">

<script>
    var txtnext = <?php echo $json . ';'; ?>;   
        for (var i = 0; i < txtnext.length; i++) {
            txtnext[i].no_of_room = "0";
        }
    
    
</script>
<script>
    $(document).ready(function() {
      
    });
</script>

<script>
    $(document).ready(function() {
        makeActiveLink();
        


        var room_id;
        $(".available-room").change(function() {

            room_id = $(this).parent().prev().prev().prev('td').parent().attr('id');
            var booked = $(this).val();

            for (var i = 0; i < txtnext.length; i++) {
                if (txtnext[i].id == room_id) {
                    txtnext[i].no_of_room = booked;
                    break;
                }

            }


            var rooms = $(this).val();
            var price = $(this).parent().prev('td').children('span.priceTag').text();
            var total = rooms * price;

            $(this).parent().next('td').children('span.subTotal').text(total);

            calculateSum();
            makeActiveLink();


        });
    });

    


    function calculateSum() {
        var ab = 0;
        var sum = 0;
// iterate through each td based on class and add the values
        $(".subTotal").each(function() {

            var value = $(this).text();

            // add only if the value is number
            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);

            }
        });
        $("#total_price").text(sum);

    }

    function makeActiveLink()
    {
        if (($("#total_price").text() == '.00') || ($("#total_price").text() == '0'))
        {
            $('#popupBtn').attr('disabled', 'disabled');
        }
        else
        {
            $('#popupBtn').removeAttr('disabled');
        }
    }
</script>




<script>
   
</script>









<script type="text/javascript">
    var currenttime = "Apr 28, 2014 2:41:06 PM";

    var greeting = " PM";
    var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
    var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
    var numbersEng = Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    var serverdate = new Date(currenttime);
    function padlength(what) {
        var output = (what.toString().length == 1) ? "0" + what : what
        return output
    }
    function displaytime() {
        serverdate.setSeconds(serverdate.getSeconds() + 1)
        var datestring = montharray[serverdate.getMonth()] + " " + padlength(serverdate.getDate()) + ", " + serverdate.getFullYear()
        var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds())
        if (timestring == "23:59:59") {
            window.location.reload()
        } else {
            var arr = timestring.split("");
            for (i = 0; i < arr.length; i++) {
                if (arr[i] != ":") {
                    arr[i] = numbersEng[arr[i]];
                }
            }
            timestring = arr.join("");
            document.getElementById("NepaliTime").innerHTML = timestring + greeting;
        }
    }
    setInterval("displaytime()", 1000);


</script>   

<!--loading currency_helper  -->
<?php
$this->load->helper('currency');
?>
<!--      -->
<table class="room-listing-tbl" style="width: 100%;">
    <tr id="checkinStyle">
        <td><b>Checkin Date:</b>&nbsp;<?php echo $abc['checkin']; ?></td>
        <td><b>Checkout Date:</b>&nbsp;<?php echo $abc['checkout']; ?></td>
        <td><b>No. of Adults:</b>&nbsp;<?php echo $abc['adult']; ?></td>
        <td><b>No. of Children:</b>&nbsp;<?php echo $abc['child']; ?></td>
    </tr>
</table>

<p></p>
<!-- ----------------->
<div id="room_book">
    <table width="100%" id="popuptbl">
        <tr style="color:#0077b3">
            <th width="25%">Room</th>
            <th width="30%">Facilities</th>
            <th width="15%">Price</th>
            <th width="20%">Available Rooms</th>
            <th width="10%">Total Price</th>
            <?php
            if (isset($query)) {


                foreach ($query as $book) {
                    ?>
                <tr id="<?php echo $book->id; ?>"><td>
                        <div style="float: left; margin-right: 10px;"><img src="<?php echo base_url() . 'uploads/' . $book->image; ?>" width="50px" height="50px"></div>
                        <div style="font-size: 16px;width: 60%; float: left;" id="room-name"><?php echo $book->room_name; ?></div><br>  


                    </td> 
                    <td><?php echo $book->description; ?></td>
                    <td>
                        <?php get_currency($book->price); ?> <!-- Sending price of room to currency_helper -->
                    </td>
                    <td> 
                        <?php $available_room = $book->no_of_room; ?>

                        <select class="available-room" style="width: 80px;" onchange="calculateSum()">
                            <option value="0">Select</option>
                            <?php
                            for ($i = 1; $i <= $available_room; $i++) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>

                        </select>

                    </td>

                    <td>    
                        <span>Rs.</span> <span class="subTotal">.00</span>
                    </td>

                </tr>

                <?php
            }
        }
        ?>
        <tr>
            <td colspan="3" style="text-align:right;"><td><b>Total</b></td>
            <td><span>Rs.</span>
                <span id="total_price">.00</span></td>
        </tr>
    </table>
    <div id="action">

        <input type="submit" value="Next" id="popupBtn" class="chooseRoom"></div>
</div>