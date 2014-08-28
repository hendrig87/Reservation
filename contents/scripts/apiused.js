var base_url = "http://localhost/reservation/";


function changeFunc() {
    $('#loading').show();
   
    var checkin = $("#CheckIn").val();
    var checkout = $("#CheckOut").val();
    var adult = $("#adults").val();
    var child = $("#childs").val();
     var hotelId = $("#hotelId").val();
     var title = $("#title").val();;
    $.ajax({
        type: "POST",
        url: base_url + "index.php/room_booking/post_action",
        data: {
            'checkin': checkin,
            'checkout': checkout,
            'adult': adult,
            'child': child,
           'hotelId': hotelId,
           'title': title
        },
        success: function(msg)
        {

            $("#replaceMe").html(msg);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
}

function book()         //function to be calle for personal info view.
{
    $('#loading').show();
     var hotelId= $('#selectedHotelId').val();
    var title= "";

    $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/book_now',
        data: {
            'hotelId': hotelId,
           'title': title
        },
        success: function(msgs)
        {

            $("#room_book").html(msgs);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
}

function back() {
      
      var checkin = $("#checkin").val();
      var checkout = $("#checkout").val();
     var adult = $("#adult").val();
      var child = $("#child").val();
       var hotelId= $('#selectedHotelId').val();
       var title = $('#title').val();

  
   //alert(checkin);
 $.ajax({
 type: "POST",
 url: base_url + "index.php/room_booking/post_action",
 data: {
     'checkin' : checkin,
     'checkout' : checkout,
     'adult' : adult,
     'child' : child,
     'hotelId':hotelId,
     'title':title
        },
  success: function(msg) 
        {    
            $('#one').css({'background-color': '#0077b3'}); 
         $('.first').css({'color': '#0077b3'}); 
         $('.first').css({'font-weight': 'bold'});
         $('#two').css({'background-color': '#999999'});
                $('.second').css({'color': 'black'});
                $('.second').css({'font-weight': 'normal'});
            $("#replaceMe").html(msg);  
            
        }
 });
 
 }
 
 function backbutton()
 {
    var hotelId = 'hotelId=' + '1';
    var title = $('#title').val();
   // var fullname = $('#fullname').val();
      
 $.ajax({
 type: "POST",
 url: base_url + "index.php/room_booking/book_now",
 data:{
    'hotelID': hotelId,
    'title':title
 },
  success: function(msgs) 
        {
     $('#one').css({'background-color': '#999999'});
            $('.first').css({'color': 'black'});
            $('.first').css({'font-weight': 'normal'});
            $('#two').css({'background-color': '#0077b3'});
            $('.second').css({'color': '#0077b3'});
            $('.second').css({'font-weight': 'bold'});
            $('#three').css({'background-color': '#999999'});
            $('.third').css({'color': 'black'});
            $('.third').css({'font-weight': 'normal'});
            $("#room-listing-tbl").show;
            $("#room_book").html(msgs);
            
        }
 });
 }
 
 
 

function roomBook()      // function to call for payment info view.
{
  
    $('#loading').show();
   
    var jsondata = $('#myjson').val();
    var total = $('#pi_total').html();
    var fullname = $('#fullname').val();
    var address = $('#address').val();
    var occupation = $('#occupation').val();
    var nationality = $('#nationality').val();
    var contactno = $('#contactno').val();
    var email = $('#email').val();
    var remarks = $('#remarks').val();
    var checkin = $("#fromDate").val();
    var checkout = $("#toDate").val();
    var adult = $("#adults").val();
    var child = $("#childs").val();
    var hotelId= $('#hotelId').val();
    var title= "";
    $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/personal_info',
        data: {
            'total_price': total,
            'fullnames': fullname,
            'addresss': address,
            'occupations': occupation,
            'nationalitys': nationality,
            'contactnos': contactno,
            'emails': email,
            'remarkss': remarks,
            'updated_json': jsondata,
            'checkin': checkin,
            'checkout': checkout,
            'adult': adult,
            'child': child,
            'hotelId': hotelId,
            'title':title
        },
        success: function(msgs)
        {

            $("#room_book").html(msgs);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
    $('#one').css({'background-color': '#999999'});
}


function roomBookView()      // function to call for payment info view.
{
  
    $('#loading').show();
   
    var jsondata = $('#myjson').val();
    var total = $('#pi_total').html();
    var fullname = $('#fullname').val();
    var address = $('#address').val();
    var occupation = $('#occupation').val();
    var nationality = $('#nationality').val();
    var contactno = $('#contactno').val();
    var email = $('#email').val();
    var remarks = $('#remarks').val();
    var checkin = $("#CheckIn").val();
    var checkout = $("#CheckOut").val();
    var adult = $("#adult").val();
    var child = $("#child").val();
    

    $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/personal_info',
        data: {
            'total_price': total,
            'fullnames': fullname,
            'addresss': address,
            'occupations': occupation,
            'nationalitys': nationality,
            'contactnos': contactno,
            'emails': email,
            'remarkss': remarks,
            'updated_json': jsondata,
            'checkin': checkin,
            'checkout': checkout,
            'adult': adult,
            'child': child
        },
        success: function(msgs)
        {

            $("#replaceMe").html(msgs);

        },
         complete: function(){
        $('#loading').hide();
      }
    });
    $('#one').css({'background-color': '#999999'});
}






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


$(document).ready(function(event){
    
    $("#CheckIn").click(function(){
        $(".error").fadeOut(2000);
    });
    
     $("#CheckOut").click(function(){
        $(".error").fadeOut(2000);
    });
    
    
    
    
     var replaced = $("#changePopup").html();
         $("#checkinbtn").click(function(){
             
      // checks for valid date code part
     
   var dtVal=$('#CheckIn').val();
   if(ValidateDate(dtVal))   //calling ValidateDate function
   {
      $('.error').hide();
   }
   else
   {
     $('.error').fadeIn(1500);
     event.preventDefault();
   }
             
             
              var dtVal=$('#CheckOut').val();
   if(ValidateDate(dtVal))   //calling ValidateDate function
   {
      $('.error').fadeOut(1500);
   }
   else
   {
     $('.error').fadeIn(1500);
     event.preventDefault();
   }
    // end for checks for valid date code part         
             
             
      $("#changePopup").html(replaced); 
$(".middleLayer").show();
        $(".popup").show();
                path();
                $('#one').css({'background-color': '#0077b3'});
                $('.first').css({'color': '#0077b3'});
                $('.first').css({'font-weight': 'bold'});
                changeFunc(); // function show popup
    });
});

function ValidateDate(dtValue)                   //checks valid date Format.
{
    
var dtRegex = new RegExp(/\b\d{4}[-]\d{1,2}[-]\d{1,2}\b/);
return dtRegex.test(dtValue);
}

function makeActiveLink()    //function to make the link deactive when no rooms number is selected.
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


function calculateSum() {   //function to calculate the total price of the booked room.
   
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





  $(document).ready(function(){   
        //close popup.
        $("#closePopup").click(function(){
            
            var title = '1';
         
             $.ajax({
        type: "POST",
        url: base_url + 'index.php/room_booking/destroy_session',
        data: {
            
            
            'title':title
        },
        success: function(msgs)
        {

           $("#pop_up").hide();
        $(".middleLayer").fadeOut(300);
        }          
            
        });
          
    });
          
    });


