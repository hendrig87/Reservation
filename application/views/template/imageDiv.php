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
        //width: 400px;
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
                    function openPopUp() {
                  
    
                         $('#loading').show();
                         
                        var checkin = $("#fromDate").val();
                        var checkout = $("#toDate").val();
                        
                         
                        
                        var adult = $("#adults").val();
                        var child = $("#childs").val();
                        var hotelId = $("#tags").val();
                        var title = "";
                        
                        // alert( adult);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php/room_booking/post_action'; ?>",
                            data: {
                                'checkin': checkin,
                                'checkout': checkout,
                                'adult': adult,
                                'child': child,
                                'hotelId': hotelId,
                                'title':title
                            },
                            
                                success: function(msg)
        {

            $("#replaceMe").html(msg);
          x=$(".search").position();
         // var topvalue = x.top;
        
        // var leftvalue = x.left;
  //calculating offset for displaying popup message
  leftVal="5"+"%";
  topVal=x.top+"px";
             $('.popup').css({left:leftVal,top:topVal}).show();
        },
         complete: function(){
        $('#loading').hide();
      }
    });
}

$(document).ready(function(event){
      
                   $('#search').click(function (){
                       var checkin = $("#fromDate").val();
                        var checkout = $("#toDate").val();
     var stDate = new Date(checkin);
                          var enDate = new Date(checkout);
            var compDate = enDate - stDate;
            if(compDate >= 0)
                {
              $('.errormsgs').hide();
                }
            else 
            {
                $('.errormsgs').fadeIn(1500);
     event.preventDefault();
            } 
                   });
    $("#fromDate").click(function(){
        $(".errormsgs").fadeOut(2000);
    });
    
     $("#toDate").click(function(){
        $(".errormsgs").fadeOut(2000);
    });
    
    $("#tags").click(function(){
        $(".errormsgs").fadeOut(2000);
    });
    
    
     var replaced = $("#changePopup").html();
         $("#search").click(function(){
             
      // checks for valid date code part
     
   var dtVal=$('#fromDate').val();
   if(ValidateDate(dtVal))   //calling ValidateDate function
   {
      $('.errormsgs').hide();
   }
   else
   {
     $('.errormsgs').fadeIn(1500);
     event.preventDefault();
   }
             
             
              var dtVal=$('#toDate').val();
   if(ValidateDate(dtVal))   //calling ValidateDate function
   {
      $('.errormsgs').fadeOut(1500);
   }
   else
   {
     $('.errormsgs').fadeIn(1500);
     event.preventDefault();
   }
   
   var hotel=$('#tags').val();
   if(hotel!=="")   //calling ValidateDate function
   {
      $('.errormsgs').fadeOut(1500);
   }
   else
   {
     $('.errormsgs').fadeIn(1500);
     event.preventDefault();
   }
   
   var adult=$('#adults').val();
   if(adult > "0")   //calling ValidateDate function
   {
      $('.errormsgs').fadeOut(1500);
   }
   else
   {
     $('.errormsgs').fadeIn(1500);
     event.preventDefault();
   }
    // end for checks for valid date code part         
             
             
      $("#changePopup").html(replaced); 
$(".middleLayer").fadeToggle(1000);
        $(".popup").fadeToggle(1300);
                path();
                $('#one').css({'background-color': '#0077b3'});
                $('.first').css({'color': '#0077b3'});
                $('.first').css({'font-weight': 'bold'});
                openPouUp(); // function show popup
    });
});


$(document).keydown(function(e){
if (e.keyCode == 27)
{
$(".popup").hide();
        $(".middleLayer").fadeOut(300);
}
});



function path() {
$("#path").show();
}

                </script>         




                <?php
                $adultsNumber = 15;
                $children = 15;
                ?>
<span class="errormsgs"><span class="error_sign">!</span>&nbsp;Please select hotel, from, to date and no of person. </span>
                <div class="ui-widget">
                    <label for="tags">Search by hotel name, address or contact.</label>
                    <input placeholder="Select a Hotel..." id="tags" >
                </div>
                <!-- till here-->

         <!--   <span>Request the reservation we will come back to you shortly.</span>-->







                <input name="CheckIn" type="text" placeholder="From" required="required" id="fromDate" >



                <input name="CheckOut" type="text" placeholder="To"  value="" id="toDate"  required="required">



                <select name="adults" id="adults">
                    <option value="0" > Select no. of adult</option> 
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

                <input type ="button" id="search" class="search" onclick="openPopUp()"  value="PROCEED TO BOOKING" />
        </div>

    </div>
</div>