<link rel="stylesheet" type="text/css" href="<?php echo base_url().'contents/styles/test.css';?> " />
<script type="text/javascript">
var currenttime = "Apr 28, 2014 2:41:06 PM"										
var greeting = " PM";
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
var numbersEng = Array(0,1, 2, 3, 4, 5, 6, 7, 8, 9);
var serverdate=new Date(currenttime);					
function padlength(what){
	var output=(what.toString().length==1)? "0"+what : what
	return output
}					
function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1)
	var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
	var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
		if(timestring == "23:59:59"){
			window.location.reload()
		} else {
			var arr = timestring.split("");
				for(i=0; i < arr.length; i++){
					if(arr[i] != ":"){
					arr[i] = numbersEng[arr[i]];
				}
			}
			timestring = arr.join("");
			document.getElementById("NepaliTime").innerHTML= timestring + greeting ;
		}
}
setInterval("displaytime()", 1000);
</script>   
<script src="<?php echo base_url().'contents/scripts/test.js' ?>"></script>
<table>
        	<tr>
                <td style="width:400px;">
                <fieldset>
            <legend>Reservation Information</legend>

                <div class="input-prepend input-append">
                <span class="add-on">Check In</span>
                <input name="CheckIn" type="text" required="required" style="width:185px; cursor:pointer;" id="CheckIn" value="">
                <span class="add-on" style="width:auto; "><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend input-append">
                <span class="add-on">Check Out</span>
                <input name="CheckOut" type="text" style="width:185px; cursor:pointer;" required="required" id="CheckOut" value="">
                <span class="add-on" style="width:auto;"><img src='<?php echo base_url().'contents/images/ParkReserve.png' ;?>' style="width: 15px; height: 20px;" ></span>
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Room</span>
                <select name="Room" style="width:223px;">
                <option selected value="DeluxeDouble">Deluxe Double</option><option  value="DeluxeSingle">Deluxe Single</option><option  value="StandardDouble">Standard Double</option><option  value="StandardSingle">Standard Single</option><option  value="BudgetDouble">Budget Double</option><option  value="BudgetSingle">Budget Single</option><option  value="TrippleBedBudget">Tripple Bed Budget</option>                </select>
                
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">No. of Adults</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Adults" name="NoAdults" >
                </div>
                <div class="input-prepend">
                <span class="add-on">No. of Childs</span>
                <input onkeypress='return isNumberKey(event)' class="input" style="width:35px;" required="required" maxlength="2" type="text" placeholder="Number of Childs" name="NoChild" >
                </div>
                
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Purpose of Visit</span>
                <input class="input input-large" type="text" placeholder="Purpose of Visit" name="WhyVisit" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Mode of Payment</span>
                <select name="PaymentMode" style="width:223px;">
                <option value="Cash">Cash</option>
                <option value="Travel Check">Travel Check</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Agent">Agent</option>
                </select>
                </div>
                
            </fieldset>
            
                <textarea name="Remarks" placeholder="Remarks & Extra Instructions Like Pickup & Dropoff Information." style="width:330px;height:100px;resize:none;"></textarea>
                </td>
                <td  style="width:40px;"></td>
                <td style="width:400px;">
                <fieldset>
            <legend>Personal Information</legend>
                <div class="input-prepend">
                <span class="add-on">Full Name</span>
                <input class="input input-large" type="text" placeholder="Full Name" required="required" name="FullName" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Address</span>
                <input class="input input-large" type="text" placeholder="Full Address" required="required" name="Address" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Occupation</span>
                <input class="input input-large" type="text" placeholder="Occupation" name="Occupation" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Nationality</span>
                <input class="input input-large" type="text" placeholder="Nationality" required="required" name="Nationality" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Passport No.</span>
                <input class="input input-large" type="text" placeholder="Passport Number" required="required" name="PassportNumber" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Visa No.</span>
                <input class="input input-large" type="text" placeholder="Visa Number" required="required" name="VisaNumber" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Contact No.</span>
                <input onkeypress='return isNumberKey(event)' class="input input-large" type="text" placeholder="Contact Number" required="required" name="ContactNumber" >
                </div>
                
                <div class="clear"></div>
                <div class="input-prepend">
                <span class="add-on">Email</span>
                <input class="input input-large" type="text" placeholder="Email Address" required="required" name="Email" >
                </div>
            </fieldset>
            <button type="submit" class="btn btn-info">Make A Reservation</button>
                </td>
            </tr>
        </table>