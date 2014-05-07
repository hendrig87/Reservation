//Global variable 

var base_url = "http://localhost/reservation/";

 
    

    


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
            $('#disablebtn').val('yes');
            //$('#popupBtn').attr('disabled', 'disabled');
        }
        else
        {
            $('#disablebtn').val('no');
            //$('#popupBtn').removeAttr('disabled');            
        }
        
    }
    
 function book()
    {
        var dataString = 'hotelId=' + '1';

        $.ajax({
            type: "POST",
            url: base_url+'index.php/room_booking/book_now',
            data: dataString,
            success: function(msgs)
            {

                $("#room_book").html(msgs);

            }
        });
    }


 function roomBook()
    {
        var dataString = 'hotelId=' + '1';
        $.ajax({
            type: "POST",
            url: base_url+'index.php/room_booking/personal_info',
            data: dataString,
            success: function(msgs)
            {

                $("#replaceMe").html(msgs);

            }
        });
        $('#one').css({'background-color': '#999999'});
    }




function personal_info() {   
        var total = 0;

        var predata = '<table width="400px" style="padding-top:20px;" id="bookSummary">' +
                '<tr style="background:#e6e9f2;font-weight: bold;border-bottom:solid thin #CCCCCC;" >' +
                '<td style="width:35%;">Rooms</td>' +
                '<td style="width:20%;">Booked</td>' +
                '<td style="width:20%;">Price</td>' +
                '<td style="width:25%;">Sub-Total</td></tr>';
        var nextdata = "";
        for (var i = 0; i < txtnext.length; i++)
        {
            if (txtnext[i].no_of_room != 0)
            {
                nextdata += '<tr style="border-bottom:solid thin #CCCCCC;"><td><span id="room_name">' +
                        txtnext[i].room_name + '</span> </td><td><span id="booked_room">' +
                        txtnext[i].no_of_room + '</span> </td><td><span id="room_price">' +
                        txtnext[i].price + '</span></td><td><span id="sub_total">' + txtnext[i].no_of_room * txtnext[i].price + '</span></td></tr>';
            }

            total += (txtnext[i].no_of_room) * (txtnext[i].price);

        }

        var postdata = '<tr style="border-bottom:solid thin #CCCCCC;"><td colspan="3"><b>Total Price</b></td><td><div id="pi_total"><b>' + total + '<b></div></td></tr></table>';
        $('#table').html(predata + nextdata + postdata);
   }



function changeFunc() {
    
      var checkin = $("#CheckIn").val();
      var checkout = $("#CheckOut").val();
     var adult = $("#adult").val();
      var child = $("#child").val();
      
 $.ajax({
 type: "POST",
 url: base_url+"index.php/room_booking/post_action",
 data: {
     'checkin' : checkin,
     'checkout' : checkout,
     'adult' : adult,
     'child' : child,
     'hotelId':"1"
        },
  success: function(msg) 
        {           
            
            $("#replaceMe").html(msg);
                        
        }
 });
 }



$(document).ready(function(){
   var replaced = $("#changePopup").html();
   var room_id;
   
    $("#closePopup").click(function(){
        $("#changePopup").html(replaced);
         });
       
   
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
        
    $("#popupBtn").live('click',function(e){
        
        if($('#disablebtn').val() == 'yes')
        {
            e.preventDefault();
            alert('Please select the rooms');
            return false;
        }
        else
        {
            $('#one').css({'background-color': '#999999'});
            $('.first').css({'color': 'black'});
            $('.first').css({'font-weight': 'normal'});
            $('#two').css({'background-color': '#0077b3'});
            $('.second').css({'color': '#0077b3'});
            $('.second').css({'font-weight': 'bold'});
            book();
        }
        });
        
    $("#checkin").live('click',(function(){
         $(".middleLayer").show();
         $(".popup").show();
    
   loading(); // loading
  
	            setTimeout(function(){ // then show popup, deley in .5 second
	closeloading();
        path();
         $('#one').css({'background-color': '#0077b3'}); 
         $('.first').css({'color': '#0077b3'}); 
         $('.first').css({'font-weight': 'bold'});
    
        changeFunc(); // function show popup
	            }, 1000); // .5 second
	
    });
      });
    
    

    


$(".personalInfo").live('click',function() {

            $('#one').css({'background-color': '#999999'});
            $('.first').css({'color': 'black'});
            $('.first').css({'font-weight': 'normal'});
            $('#two').css({'background-color': '#999999'});
            $('.second').css({'color': 'black'});
            $('.second').css({'font-weight': 'normal'});

            $('#three').css({'background-color': '#0077b3'});
            $('.third').css({'color': '#0077b3'});
            $('.third').css({'font-weight': 'bold'});
            roomBook();
            personal_info();
        });

     });





    $(document).keydown(function(e){
    if(e.keyCode==27)
    {
        $(".popup").hide();
        $(".middleLayer").fadeOut(300);
    }
});
// function to call
 
 $( document ).ajaxComplete(function( event,request, settings ) {
 $("#closePopup").click(function(){
      $(".middleLayer").fadeOut(300);
         $('.popup').hide();
         $('#changePopup').html();
         
        });
});
 
 function loading() {
	        $("#loading").show();
                
	    }
            
            
 function path() {
	        $("#path").show();
	    }
            
function closeloading() {
	        $("#loading").fadeOut('fast');
	    }
            
            
            
           
 //Personal info methods
   



        
 
