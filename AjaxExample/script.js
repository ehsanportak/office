$(document).ready(function(){ 
    $("#get-info").click(function(){
        $.ajax("http://api.joind.in/v2.1/talks/10889", {     
            dataType: 'json', // نوع داده های دریافتی از سرور را مشخص می کند      
            error: function() { // این تابع زمانی که درخواست با شکست مواجه شود، فراخوانی می شود
               $("#result").html('<p>An error has occurred</p>');
            },            
            success: function(data) { // این تابع زمانی که درخواست موفق باشد، فراخوانی می شود
               var $title = $('<h2>').text(data.talks[0].talk_title);
               var $description = $('<p>').text(data.talks[0].talk_description);
               $("#result")
                  .append($title)
                  .append($description);
            },
            type: 'GET' // متد مورد استفاده برای درخواست را مشخص می کند. می تواند GET یا POST باشد
        });
    });
});
