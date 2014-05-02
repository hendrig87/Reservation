$(document).ready(
        function (){
  $(".available-room").change(function(){
   
     var rooms = $(this).val();
    var price = $(this).parent().prev('td').children('span.priceTag').text();
         var total = rooms * price; 
        
         $(this).parent().next('td').children('span.subTotal').text(total);
    
  });
}); 

