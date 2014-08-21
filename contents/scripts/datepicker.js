var base_url = "http://localhost/reservation/";


function changeFunc() {
    $('#loading').show();
   
    var checkin = $("#CheckIn").val();
    var checkout = $("#CheckOut").val();
    var adult = $("#adults").val();
    var child = $("#childs").val();
     var hotelId = "10";
     var title = "";
     alert('api');
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
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var adult = $("#adults").val();
    var child = $("#childs").val();
    var hotelId= $('#selectedHotelId').val();
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


$(function(){
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var checkin = $('#fromDate').datepicker({
  onRender: function(date) {
	return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
	var newDate = new Date(ev.date)
	newDate.setDate(newDate.getDate() + 1);
	checkout.setValue(newDate);
  }
  checkin.hide();
  $('#toDate')[0].focus();
}).data('datepicker');
var checkout = $('#toDate').datepicker({
  onRender: function(date) {
	return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
});



$(function(){
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var checkin = $('#CheckIn').datepicker({
  onRender: function(date) {
	return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
	var newDate = new Date(ev.date)
	newDate.setDate(newDate.getDate() + 1);
	checkout.setValue(newDate);
  }
  checkin.hide();
  $('#CheckOut')[0].focus();
}).data('datepicker');
var checkout = $('#CheckOut').datepicker({
  onRender: function(date) {
	return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
});

/* =========================================================
 
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */
 
!function( $ ) {
	
	// Picker object
	
	var Datepicker = function(element, options){
		this.element = $(element);
		this.format = DPGlobal.parseFormat(options.format||this.element.data('date-format')||'yyyy-mm-dd');
		this.picker = $(DPGlobal.template)
							.appendTo('body')
							.on({
								click: $.proxy(this.click, this)//,
								//mousedown: $.proxy(this.mousedown, this)
							});
		this.isInput = this.element.is('input');
		this.component = this.element.is('.date') ? this.element.find('.add-on') : false;
		
		if (this.isInput) {
			this.element.on({
				focus: $.proxy(this.show, this),
				//blur: $.proxy(this.hide, this),
				keyup: $.proxy(this.update, this)
			});
		} else {
			if (this.component){
				this.component.on('click', $.proxy(this.show, this));
			} else {
				this.element.on('click', $.proxy(this.show, this));
			}
		}
	
		this.minViewMode = options.minViewMode||this.element.data('date-minviewmode')||0;
		if (typeof this.minViewMode === 'string') {
			switch (this.minViewMode) {
				case 'months':
					this.minViewMode = 1;
					break;
				case 'years':
					this.minViewMode = 2;
					break;
				default:
					this.minViewMode = 0;
					break;
			}
		}
		this.viewMode = options.viewMode||this.element.data('date-viewmode')||0;
		if (typeof this.viewMode === 'string') {
			switch (this.viewMode) {
				case 'months':
					this.viewMode = 1;
					break;
				case 'years':
					this.viewMode = 2;
					break;
				default:
					this.viewMode = 0;
					break;
			}
		}
		this.startViewMode = this.viewMode;
		this.weekStart = options.weekStart||this.element.data('date-weekstart')||0;
		this.weekEnd = this.weekStart === 0 ? 6 : this.weekStart - 1;
		this.onRender = options.onRender;
		this.fillDow();
		this.fillMonths();
		this.update();
		this.showMode();
	};
	
	Datepicker.prototype = {
		constructor: Datepicker,
		
		show: function(e) {
			this.picker.show();
			this.height = this.component ? this.component.outerHeight() : this.element.outerHeight();
			this.place();
			$(window).on('resize', $.proxy(this.place, this));
			if (e ) {
				e.stopPropagation();
				e.preventDefault();
			}
			if (!this.isInput) {
			}
			var that = this;
			$(document).on('mousedown', function(ev){
				if ($(ev.target).closest('.datepicker').length == 0) {
					that.hide();
				}
			});
			this.element.trigger({
				type: 'show',
				date: this.date
			});
		},
		
		hide: function(){
			this.picker.hide();
			$(window).off('resize', this.place);
			this.viewMode = this.startViewMode;
			this.showMode();
			if (!this.isInput) {
				$(document).off('mousedown', this.hide);
			}
			//this.set();
			this.element.trigger({
				type: 'hide',
				date: this.date
			});
		},
		
		set: function() {
			var formated = DPGlobal.formatDate(this.date, this.format);
			if (!this.isInput) {
				if (this.component){
					this.element.find('input').prop('value', formated);
				}
				this.element.data('date', formated);
			} else {
				this.element.prop('value', formated);
			}
		},
		
		setValue: function(newDate) {
			if (typeof newDate === 'string') {
				this.date = DPGlobal.parseDate(newDate, this.format);
			} else {
				this.date = new Date(newDate);
			}
			this.set();
			this.viewDate = new Date(this.date.getFullYear(), this.date.getMonth(), 1, 0, 0, 0, 0);
			this.fill();
		},
		
		place: function(){
			var offset = this.component ? this.component.offset() : this.element.offset();
			this.picker.css({
				top: offset.top + this.height,
				left: offset.left
			});
		},
		
		update: function(newDate){
			this.date = DPGlobal.parseDate(
				typeof newDate === 'string' ? newDate : (this.isInput ? this.element.prop('value') : this.element.data('date')),
				this.format
			);
			this.viewDate = new Date(this.date.getFullYear(), this.date.getMonth(), 1, 0, 0, 0, 0);
			this.fill();
		},
		
		fillDow: function(){
			var dowCnt = this.weekStart;
			var html = '<tr>';
			while (dowCnt < this.weekStart + 7) {
				html += '<th class="dow">'+DPGlobal.dates.daysMin[(dowCnt++)%7]+'</th>';
			}
			html += '</tr>';
			this.picker.find('.datepicker-days thead').append(html);
		},
		
		fillMonths: function(){
			var html = '';
			var i = 0
			while (i < 12) {
				html += '<span class="month">'+DPGlobal.dates.monthsShort[i++]+'</span>';
			}
			this.picker.find('.datepicker-months td').append(html);
		},
		
		fill: function() {
			var d = new Date(this.viewDate),
				year = d.getFullYear(),
				month = d.getMonth(),
				currentDate = this.date.valueOf();
			this.picker.find('.datepicker-days th:eq(1)')
						.text(DPGlobal.dates.months[month]+' '+year);
			var prevMonth = new Date(year, month-1, 28,0,0,0,0),
				day = DPGlobal.getDaysInMonth(prevMonth.getFullYear(), prevMonth.getMonth());
			prevMonth.setDate(day);
			prevMonth.setDate(day - (prevMonth.getDay() - this.weekStart + 7)%7);
			var nextMonth = new Date(prevMonth);
			nextMonth.setDate(nextMonth.getDate() + 42);
			nextMonth = nextMonth.valueOf();
			var html = [];
			var clsName,
				prevY,
				prevM;
			while(prevMonth.valueOf() < nextMonth) {
				if (prevMonth.getDay() === this.weekStart) {
					html.push('<tr>');
				}
				clsName = this.onRender(prevMonth);
				prevY = prevMonth.getFullYear();
				prevM = prevMonth.getMonth();
				if ((prevM < month &&  prevY === year) ||  prevY < year) {
					clsName += ' old';
				} else if ((prevM > month && prevY === year) || prevY > year) {
					clsName += ' new';
				}
				if (prevMonth.valueOf() === currentDate) {
					clsName += ' active';
				}
				html.push('<td class="day '+clsName+'">'+prevMonth.getDate() + '</td>');
				if (prevMonth.getDay() === this.weekEnd) {
					html.push('</tr>');
				}
				prevMonth.setDate(prevMonth.getDate()+1);
			}
			this.picker.find('.datepicker-days tbody').empty().append(html.join(''));
			var currentYear = this.date.getFullYear();
			
			var months = this.picker.find('.datepicker-months')
						.find('th:eq(1)')
							.text(year)
							.end()
						.find('span').removeClass('active');
			if (currentYear === year) {
				months.eq(this.date.getMonth()).addClass('active');
			}
			
			html = '';
			year = parseInt(year/10, 10) * 10;
			var yearCont = this.picker.find('.datepicker-years')
								.find('th:eq(1)')
									.text(year + '-' + (year + 9))
									.end()
								.find('td');
			year -= 1;
			for (var i = -1; i < 11; i++) {
				html += '<span class="year'+(i === -1 || i === 10 ? ' old' : '')+(currentYear === year ? ' active' : '')+'">'+year+'</span>';
				year += 1;
			}
			yearCont.html(html);
		},
		
		click: function(e) {
			e.stopPropagation();
			e.preventDefault();
			var target = $(e.target).closest('span, td, th');
			if (target.length === 1) {
				switch(target[0].nodeName.toLowerCase()) {
					case 'th':
						switch(target[0].className) {
							case 'switch':
								this.showMode(1);
								break;
							case 'prev':
							case 'next':
								this.viewDate['set'+DPGlobal.modes[this.viewMode].navFnc].call(
									this.viewDate,
									this.viewDate['get'+DPGlobal.modes[this.viewMode].navFnc].call(this.viewDate) + 
									DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1)
								);
								this.fill();
								this.set();
								break;
						}
						break;
					case 'span':
						if (target.is('.month')) {
							var month = target.parent().find('span').index(target);
							this.viewDate.setMonth(month);
						} else {
							var year = parseInt(target.text(), 10)||0;
							this.viewDate.setFullYear(year);
						}
						if (this.viewMode !== 0) {
							this.date = new Date(this.viewDate);
							this.element.trigger({
								type: 'changeDate',
								date: this.date,
								viewMode: DPGlobal.modes[this.viewMode].clsName
							});
						}
						this.showMode(-1);
						this.fill();
						this.set();
						break;
					case 'td':
						if (target.is('.day') && !target.is('.disabled')){
							var day = parseInt(target.text(), 10)||1;
							var month = this.viewDate.getMonth();
							if (target.is('.old')) {
								month -= 1;
							} else if (target.is('.new')) {
								month += 1;
							}
							var year = this.viewDate.getFullYear();
							this.date = new Date(year, month, day,0,0,0,0);
							this.viewDate = new Date(year, month, Math.min(28, day),0,0,0,0);
							this.fill();
							this.set();
							this.element.trigger({
								type: 'changeDate',
								date: this.date,
								viewMode: DPGlobal.modes[this.viewMode].clsName
							});
						}
						break;
				}
			}
		},
		
		mousedown: function(e){
			e.stopPropagation();
			e.preventDefault();
		},
		
		showMode: function(dir) {
			if (dir) {
				this.viewMode = Math.max(this.minViewMode, Math.min(2, this.viewMode + dir));
			}
			this.picker.find('>div').hide().filter('.datepicker-'+DPGlobal.modes[this.viewMode].clsName).show();
		}
	};
	
	$.fn.datepicker = function ( option, val ) {
		return this.each(function () {
			var $this = $(this),
				data = $this.data('datepicker'),
				options = typeof option === 'object' && option;
			if (!data) {
				$this.data('datepicker', (data = new Datepicker(this, $.extend({}, $.fn.datepicker.defaults,options))));
			}
			if (typeof option === 'string') data[option](val);
		});
	};

	$.fn.datepicker.defaults = {
		onRender: function(date) {
			return '';
		}
	};
	$.fn.datepicker.Constructor = Datepicker;
	
	var DPGlobal = {
		modes: [
			{
				clsName: 'days',
				navFnc: 'Month',
				navStep: 1
			},
			{
				clsName: 'months',
				navFnc: 'FullYear',
				navStep: 1
			},
			{
				clsName: 'years',
				navFnc: 'FullYear',
				navStep: 10
		}],
		dates:{
			days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		isLeapYear: function (year) {
			return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0))
		},
		getDaysInMonth: function (year, month) {
			return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month]
		},
		parseFormat: function(format){
			var separator = format.match(/[.\-\-\s].*?/),
				parts = format.split(/\W+/);
			if (!separator || !parts || parts.length === 0){
				throw new Error("Invalid date format.");
			}
			return {separator: separator, parts: parts};
		},
		parseDate: function(date, format) {
			var parts = date.split(format.separator),
				date = new Date(),
				val;
			date.setHours(0);
			date.setMinutes(0);
			date.setSeconds(0);
			date.setMilliseconds(0);
			if (parts.length === format.parts.length) {
				var year = date.getFullYear(), day = date.getDate(), month = date.getMonth();
				for (var i=0, cnt = format.parts.length; i < cnt; i++) {
					val = parseInt(parts[i], 10)||1;
					switch(format.parts[i]) {
						case 'dd':
						case 'd':
							day = val;
							date.setDate(val);
							break;
						case 'mm':
						case 'm':
							month = val - 1;
							date.setMonth(val - 1);
							break;
						case 'yy':
							year = 2000 + val;
							date.setFullYear(2000 + val);
							break;
						case 'yyyy':
							year = val;
							date.setFullYear(val);
							break;
					}
				}
				date = new Date(year, month, day, 0 ,0 ,0);
			}
			return date;
		},
		formatDate: function(date, format){
			var val = {
				d: date.getDate(),
				m: date.getMonth() + 1,
				yy: date.getFullYear().toString().substring(2),
				yyyy: date.getFullYear()
			};
			val.dd = (val.d < 10 ? '0' : '') + val.d;
			val.mm = (val.m < 10 ? '0' : '') + val.m;
			var date = [];
			for (var i=0, cnt = format.parts.length; i < cnt; i++) {
				date.push(val[format.parts[i]]);
			}
			return date.join(format.separator);
		},
		headTemplate: '<thead>'+
							'<tr>'+
								'<th class="prev">&lsaquo;</th>'+
								'<th colspan="5" class="switch"></th>'+
								'<th class="next">&rsaquo;</th>'+
							'</tr>'+
						'</thead>',
		contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>'
	};
	DPGlobal.template = '<div class="datepicker dropdown-menu">'+
							'<div class="datepicker-days">'+
								'<table class=" table-condensed">'+
									DPGlobal.headTemplate+
									'<tbody></tbody>'+
								'</table>'+
							'</div>'+
							'<div class="datepicker-months">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-years">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
								'</table>'+
							'</div>'+
						'</div>';

}( window.jQuery );