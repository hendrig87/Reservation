<div class="footerContainer">
<div class="col-md-3"></div>
			<div class="sitemap">
				<h3>Information</h3>
				<p class="caption">
					<a href="#" >What We Offer</a>
                                        <br>
					<a href="#">Help and FAQ</a>
					<br>
					<a href="#">Feedback Program</a>
				</p>
			</div>
			<div class="sitemap">
				<h3>Community</h3>
				<p class="caption">
                                    <a href="http://www.tech.net.np" target="_blank">Blog</a>
					<br>
					<a href="#">Meetups</a>
					<br>
					<a href="#">News &amp; Media</a>
				</p>
			</div>
			<div class="sitemap">
				<h3>Reservation</h3>
				<p class="caption">
					<a href="#">About</a>
					<br>
					<a href="#">Codes</a>
					<br>
					<a href="#">Contact Us</a>
					<br>
					<a href="#">Terms of Use</a>
					<br>
					<a href="#">Privacy Statements</a>
				</p>
			</div>
			<div class="sitemap">
				<h3>Follow us on</h3>
				<a href="https://www.facebook.com/salyani"><img style="width:30px; height:30px; border-radius: 20px;" src=<?php echo base_url().'contents/images/facebook1.jpg'; ?>  /></span></a>
                                <a href="#"  /><img style="width:30px; height:30px; border-radius: 20px;" src=<?php echo base_url().'contents/images/google1.jpg'; ?>  /></a>
				<a href="#"><img style="width:30px; height:30px; border-radius: 20px;" src=<?php echo base_url().'contents/images/twitter.jpg'; ?>  /></span></a>
				<a href="#"><img style="width:30px; height:30px; border-radius: 20px;" src=<?php echo base_url().'contents/images/in.jpg'; ?>  /></span></a>
				<div class="row row-gap-medium">
					<div id="copy">&copy; 2014 Reservation</div>
				</div>
			</div>
</div>
<div class="clear"></div> 




<h2>Create Object from JSON String</h2>
<p>Original name: <span id="origname"></span></p>
<p>New name: <span id="newname"></span></p>
<div id="nab0"></div>
<div id="nab1"></div>
<div id="nab2"></div>

<div id="newnab"></div>

<script>
var employees = [
{ "firstName" : "John" , "lastName" : "Doe","age":"25" }, 
{ "firstName" : "Anna" , "lastName" : "Smith" }, 
{ "firstName" : "Peter" , "lastName" : "Jones" }, ];
document.getElementById("origname").innerHTML=employees[0].firstName + " " + employees[0].lastName;

// Set new name
employees[0].firstName="Gilbert";
document.getElementById("newname").innerHTML=employees[0].firstName + " " + employees[0].lastName;


for(var i=0;i <employees.length; i++)
{
if(employees[i].age)
{
var id= "nab"+i;
document.getElementById(id).innerHTML = employees[i].firstName + " " + employees[1].lastName +""+ employees[i].age;
}
else
{


}
}


document.getElementById("newnab").innerHTML = "hi";

</script>
</body>
</html>