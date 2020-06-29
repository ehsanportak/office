jQuery(document).ready(function($){
    $('.nav-tab ul li a').on('click' , function(e){
        e.preventDefault();
        var $this=$(this);
        $('.nav-tab ul li a').removeClass('active');
        $this.addClass('active');
        var $container=$this.attr('href');
        $('.posts-container').css('display' , 'none');
        $($container).css('display' , 'block')

    });
    $('#top-left-social ul li a').on('click' , function(event){
        event.preventDefault();
        $.ajax({
            url : data.ajax_url,
            type: 'POST',
            data:{
                action :'sample_ajax_call',
                user_id : data.current_user_id
            },
            success:function(response){
                console.log(response);
            },
            error:function(){}
        });
    });
});
