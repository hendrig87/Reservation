//Global variable 

var base_url = "http://localhost/reservation/";


 function book()
    {
        // alert (id);
        var dataString = 'hotelId=' + '1';

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php/room_booking/book_now'; ?>",
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
       alert ("asdfadsf");
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
    $("#closePopup").click(function(){
        $("#changePopup").html(replaced);
         });
         
    
    $("#checkin").click(function(){
        
    
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
    
    $(document).keydown(function(e)
{
    if(e.keyCode == 27)
    {
        $(".popup").hide();
        $(".middleLayer").fadeOut(300);
    }
});


$(".personalInfo").click(function() {

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

  $(".chooseRoom").click(function() {

            $('#one').css({'background-color': '#999999'});
            $('.first').css({'color': 'black'});
            $('.first').css({'font-weight': 'normal'});
            $('#two').css({'background-color': '#0077b3'});
            $('.second').css({'color': '#0077b3'});
            $('.second').css({'font-weight': 'bold'});
            book();
        });

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
   



        
 
