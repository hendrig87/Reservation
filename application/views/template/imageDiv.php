<script type="text/javascript">
    $(document).ready(function(){
     $("#userA").keyup(function(){
     var value = this.value;
     var dataString = 'userA=' + value;
     if(value != ""){
    $.ajax({
        type: "POST",
        url: "http://localhost/Reservation/index.php/search_con/user",
        data: dataString,
        success: function(msgs)
        {
            $("#sugestion").html(msgs);
            //runCSS();
        }
        
    });
     }else{
            removeSugestion();
     }
});
});

$('#sugestion').on('keydown', '#link', function(e){
alert("keydown");
});
		
    function removeSugestion()
    {
        $("#sugestion").html("");
        stopCSS();
    }
			
    function addText(value)
    {
        $("#userA").val(value);
    }
			
    function runCSS()
    {
        $("#sugestion").css({
            'border' : 'solid',
            'border-width' : '1px'
        });
    }
			
    function stopCSS()
    {
        $("#sugestion").css({
            'border' : '',
            'border-width' : ''
        });
    }
					
</script>

<style type="text/css">
    #content
    {
        margin-top : 60px;
        width : 360px;
    }

    input#userA 
    {
        width : 240px;
    }

    #sugestion
    {
        text-align : left;
        padding-left : 3px;
    }

    #link:hover
    {
        background-color : #fofofo;
        cursor : default;
    }
    
   
    

</style>

  


<div id="topNavigationWithSlider">
<div class="centerDiv" id="sliderDescriptionDiv">
                <div id="reservation_temp">
<div id="title">Reservation</div>
Request the reservation we will come back to you shortly.
<!--<input type="text" placeholder="Select a Hotel..." class="selectHotel" id="selectHotel" />-->
<input type="text" placeholder="Select a Hotel..." class="selectHotel" id="userA" />
<div id="sugestion"></div>
<input type="text" placeholder="From" class="from" /><input type="text" placeholder="To" class="to"/>
<input type="text" placeholder="Adults" class="from" /><input type="text" placeholder="Child" class="to"/>
<input type="button" id="popupBtn" value="PROCEED TO BOOKING" />
</div>
                
            </div>
        </div>