/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


      
      
$(document).ready(function() {
	$('a.example4').tinytooltip({message: "Enter the description of room like facilities in it like room contains TV, AC, attached bathroom or not."});
	
	$('input.example').tinytooltip({
		message: function() {
			console.log(this);
			return $(this).val();
		},
		hover: false
	}).click(function() {
		$(this).trigger('showtooltip');
	}).blur(function() {
		$(this).trigger('hidetooltip');
	});
        
        
        $('a.example1').tinytooltip({message: "Enter the name of room like deluxe, luxury,etc"});
	
	$('input.example').tinytooltip({
		message: function() {
			console.log(this);
			return $(this).val();
		},
		hover: false
	}).click(function() {
		$(this).trigger('showtooltip');
	}).blur(function() {
		$(this).trigger('hidetooltip');
	});
        
        
          $('a.example2').tinytooltip({message: "Enter number of room based on name of the room. Like number of deluxe room=10 and so on."});
	
	$('input.example').tinytooltip({
		message: function() {
			console.log(this);
			return $(this).val();
		},
		hover: false
	}).click(function() {
		$(this).trigger('showtooltip');
	}).blur(function() {
		$(this).trigger('hidetooltip');
	});
        
        
          $('a.example3').tinytooltip({message: "Enter the price of room like deluxe cost Rs.800."});
	
	$('input.example').tinytooltip({
		message: function() {
			console.log(this);
			return $(this).val();
		},
		hover: false
	}).click(function() {
		$(this).trigger('showtooltip');
	}).blur(function() {
		$(this).trigger('hidetooltip');
	});
        
        
        
          $('a.example5').tinytooltip({message: "Enter the image of the room type."});
	
	$('input.example').tinytooltip({
		message: function() {
			console.log(this);
			return $(this).val();
		},
		hover: false
	}).click(function() {
		$(this).trigger('showtooltip');
	}).blur(function() {
		$(this).trigger('hidetooltip');
	});
        
        
        
        
        
                
   
      $("#noOfRoom").keydown(function (event) {
    var num = event.keyCode;
    if ((num > 95 && num < 106) || (num > 36 && num < 41) || num == 9) {
        return;
    }
    if (event.shiftKey || event.ctrlKey || event.altKey) {        
        event.preventDefault();
    } else if (num != 46 && num != 8) {
        if (isNaN(parseInt(String.fromCharCode(event.which)))) {
            event.preventDefault();
        }
    }
});




var count = 0;

$("#adds").click(function() {
    count++;
    $("#noOfRoom").val(count);
});



 
$("#subs").click(function() {
    var a = $("#noOfRoom").val();
    if (a<1) {
        $("#subs").die();
    }
    count--;
    $("#noOfRoom").val(count);
});
      
      
//sucess message 
$(document).ready(function(){
   setTimeout(function(){
  $("#sucess").fadeOut("slow", function () {
  $("#sucess").remove();
      });

}, 5000);
 });
//sucess message finished
    
  
});