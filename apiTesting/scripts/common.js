var base_url = "http://localhost/reservation/";

 $(document).ready(function(e) { 
     var a = $('#api-data-reserve').attr('name');
      var b = $('#api-data-reserve').attr('data');
       
    $.ajax({
                type: "POST",
                 url: base_url + 'index.php/application/viewSender',
               data: {
            'apiName' : a,
            'api' : b},
                success: function(msg)
                {
                    
                  
                    $("#api-data-reserve").html(msg);

                }
            });
            });

