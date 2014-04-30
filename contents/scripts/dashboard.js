/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


      
      
$(document).ready(function() {
    
   $('a.help1').tinytooltip({message: "Enter name of your hotel."});
   $('a.help2').tinytooltip({message: "Enter address of your hotel."});
   $('a.help3').tinytooltip({message: "Enter contact number of your hotel."});
    
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
        
        
        
        
        
                
   
      $(".onlyNumber").keydown(function (event) {
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




$("#adds").click(function() {
    var a = $("#noOfRoom").val();
    a++;
     if (a>999) {
        $("#adds").die();
    }
    $("#noOfRoom").val(a);
});



 
$("#subs").click(function() {
    var b = $("#noOfRoom").val();
    if (b<1) {
        $("#subs").die();
    }
    b--;
    $("#noOfRoom").val(b);
});
      
      
//sucess message 
   setTimeout(function(){
  $("#sucess").fadeOut("slow", function () {
  $("#sucess").remove();
      });

}, 5000);
//sucess message finished
 
  
  // for booking room
  
  
 });
  
  
  
  
  
  