<script src="<?php echo base_url() . 'contents/scripts/datepicker.js' ?>"></script>
<script>
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
<style type="text/css">
    #content
    {
        margin-top : 60px;
        width : 360px;
    }

    input#userA 
    {
        width : 360px;
        border-radius: 3px;
    }

    #sugestion
    {
        text-align : left;
        padding-left : 3px;
    }

    #link:hover
    {
        background-color : #fofofo;
        cursor : default;
    }
    .search
    {
        margin: 0px;
        padding: 12px;
        background-color: #cf2100;
        width: 400px;
        border-radius: 1px;
        border: 0px;
        font-size: 16px;
        color: #fff;
    }



</style>




<div id="topNavigationWithSlider">
    <div class="centerDiv">
        <div id="reservation_temp">
            <div id="title">
                <ul>
                    <li class="has-active"><a href="#">Hotels</a></li>

                </ul>



            </div>

            <!-- from here-->                  


                <link type="text/css" rel="stylesheet" href="<?php echo base_url() . "contents/styles/jquery-ui.css"; ?>"/>
                <script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
                <script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
                <link rel="stylesheet" href="/resources/demos/style.css">
                <script>


            $(function() {

                $("#tags").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php/search_con/user'; ?>",
                            dataType: "json",
                            data: {'userA': request.term},
                            success: function(msgs)
                            { 
                                response(msgs);
                               
                            }
                        });
                    }

                });

            });


                </script>

                <script>
                    function openPouUp() {
                        var checkin = $("#fromDate").val();
                        var checkout = $("#toDate").val();
                        var adult = $("#adults").val();
                        var child = $("#childs").val();
                        var hotelId = $("#tags").val();
                        // alert( adult);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php/room_booking/post_action'; ?>",
                            data: {
                                'checkin': checkin,
                                'checkout': checkout,
                                'adult': adult,
                                'child': child,
                                'hotelId': hotelId
                            },
                            success: function(msg)
                            {
                                $(".middleLayer").show();
                                $("#path").show();
                                $('#one').css({'background-color': '#0077b3'});
                                $('.first').css({'color': '#0077b3'});
                                $('.first').css({'font-weight': 'bold'});
                                $(".popup").show();

                                $("#replaceMe").html(msg);


                            }
                        });
                    }

                </script>         




                <?php
                $adultsNumber = 15;
                $children = 15;
                ?>

                <div class="ui-widget">
                    <label for="tags">Search by hotel name, address or contact.</label>
                    <input placeholder="Select a Hotel..." id="tags" style="width:397px; margin: 5px 0px 10px 0px;">
                </div>
                <!-- till here-->

         <!--   <span>Request the reservation we will come back to you shortly.</span>-->







                <input name="CheckIn" type="text" placeholder="From" required="required" style="width:185px; cursor:pointer;" id="fromDate" >



                <input name="CheckOut" type="text" placeholder="To" style="width:185px; cursor:pointer;" value="" id="toDate"  required="required">



                <select name="adults" id="adults" style="border-radius:0px 5px 5px 0px; width: 199px;">
                    <option value="0" > Select no. of adults</option> 
                    <?php
                    for ($i = 1; $i <= $adultsNumber; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <select name="children" required id="childs" style="border-radius:0px 5px 5px 0px; width: 199px;">
                    <option value="0" > Select no. of Childs</option>
                    <?php
                    for ($i = 1; $i <= $children; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>

                <input type ="button" class="search" onclick="openPouUp()"  value="PROCEED TO BOOKING" />
        </div>

    </div>
</div>