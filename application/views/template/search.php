  <script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
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
function getSugestion(value)
    {
        alert(' enter into function');
        if(value != "")
        {                      
            alert('enter into ajax'); 
            var userA = value;
                                        
            alert('this is typed value = '+userA);
         
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php/search_con/user'; ?>",
                data: {
                    'userA' : userA
 
                },
                success: function(msg) 
                {
            
            
                    $("#sugestion").html(msg);
                    runCSS();
            
                }
            });
                                        
        }
        else
        {	
            removeSugestion();
        }
    }
			
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
        width : 355px;
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
</head>
<body>
<center>
    <div id="content">
        <h2>Search Box</h2>
        <input type="text" name="userA" id="userA" onblur="setTimeout('removeSugestion()', 200)"
               />

        <div id="sugestion"></div>
    </div>
</center>
