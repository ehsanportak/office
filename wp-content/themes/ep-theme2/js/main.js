jQuery(document).ready(function ($){

    $('#main-content .nav-tab ul li a').on('click', function (e) {

        e.preventDefault();

        var $this = $(this);

        $('#main-content .nav-tab ul li a').removeClass('active');

        $this.addClass('active');

        var $container = $this.attr('href');

        $('#main-content .posts-container').css('display', 'none');

        //$($container).css('display','block');

        $($container).fadeIn(500, function () {

            // alert('loaded');

        });


    });
    $('#featured-contnet .nav-tab ul li a').on('click', function (e) {

        e.preventDefault();

        var $this = $(this);

        $('#featured-contnet .nav-tab ul li a').removeClass('active');

        $this.addClass('active');

        var $container = $this.attr('href');

        $('#featured-contnet .posts-container').css('display', 'none');

        //$($container).css('display','block');

        $($container).fadeIn(500, function () {

            // alert('loaded');

        });


    });
    $('#top-left-social ul li a').on('click', function (event) {

        event.preventDefault();

        $.ajax({

            url: data.ajax_url,
            type: 'post',
            data: {

                action: 'sample_ajax_call',
                user_id: data.current_user_id,
                name: 'kaivan'

            },
            success: function (response) {

                console.log(response);

            },
            error: function () {
            }

        });


    });

    //load more content
    $(document).on('click','.load-more',function(event){

        event.preventDefault();

        var $this = $(this);

        $this.text('در حال بارگذاری ...');

        var $page = parseInt($this.data('page'));

        $.ajax({

            url : data.ajax_url,
            type:'post',
            dataType:'json',
            data:{
                action:'load_more_content',
                page : $page
            },
            success:function(response){

                if( parseInt(response.count) > 0){

                    $this.parent().before(response.content);

                    $this.data('page',parseInt($page+1));

                }
                $this.text('مطالب بیشتر');

            },
            error:function(){}

        });

    });


    //like posts
    $(document).on('click','.like-post',function(event){

        event.preventDefault();

        var $this = $(this);

        var $post_id = $this.data('pid');

        if( parseInt($this.data('liked')) ){

           // alert('شما قبلا رای خود را ثبت کرده اید');
           // return false;

        }

        $.ajax({

            url : data.ajax_url,
            type:'post',
            dataType:'json',
            data:{

                action: 'like_post',
                post_id : $post_id

            },
            success:function(response){

                if( response.success ){

                    $this.find('i').text(response.count);
                    $this.data('liked',1);
                }

            },
            error: function () {}

        });

    });

});