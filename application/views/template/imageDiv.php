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
           
           var json = msgs;
           alert(json);
       

           $( "#tags" ).autocomplete({
      source: json
    });
    //$("#sugestion").html(msgs);
           
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
        width : 360px;
        border-radius: 3px;
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
    #search
    {
        margin: 0px;
        padding: 12px;
        background-color: #cf2100;
        width: 375px;
        border-radius: 1px;
        border: 0px;
        font-size: 16px;
        color: #fff;
    }
   
    

</style>

  


<div id="topNavigationWithSlider">
<div class="centerDiv">
                <div id="reservation_temp">
<div id="title">
    <ul>
        <li class="has-active"><a href="#">Hotels</a></li>
       
    </ul>
    
    
    
    </div>
                    
    <!-- from here-->
    
   
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
 
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>    
  $(function() {  
     $("#tags").keyup(function(){
     var value = this.value;
     var dataString = 'userA=' + value;
     if(value != ""){
    $.ajax({
        type: "POST",
        url: "http://localhost/Reservation/index.php/search_con/user",
        data: dataString,
       
        success: function(msgs)
        {
         var availableTags = msgs;
        showdata(availableTags);
        }
        
    });
     }else{
            removeSugestion();
     }
});

   // $( "#tags" ).autocomplete({
        
  //    source: availableTags
   // });
 
  });
  
  
  function showdata(arg)
  {
      alert(arg);
      $( "#tags" ).autocomplete({
        
      source: arg
    });  
  }
  </script>

    
    <div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
<!-- till here-->
                    
                    <span>Request the reservation we will come back to you shortly.</span>
                    
                    

<input type="text" placeholder="Select a Hotel..." class="selectHotel" id="userA" />
<div id="sugestion"></div>
<input type="text" placeholder="From" class="from" />
<input type="text" placeholder="To" class="to"/>
<input type="text" placeholder="Adults" class="from" />
<input type="text" placeholder="Child" class="to"/>
<input type="button" id="search" value="PROCEED TO BOOKING" />
</div>
                
            </div>
        </div>