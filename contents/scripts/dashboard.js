/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


      
      
$(document).ready(function() {
	$('a.example').tinytooltip({message: "Enter the description of room like facilities in it like room contains TV, AC, attached bathroom or not."});
	
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
});