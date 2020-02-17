jQuery(document).ready(function($){
    $("#post-like img").click(function(){
        s.ajax({
            type : 'POST',
            url: ep_data.ajax_url,
            data:{
                action :'ep_post_like',
            },
            beforeSend : function (xhr){

            },
            success : function (data , textStatus , jqXHR){

            }
        });
    });
 
});
