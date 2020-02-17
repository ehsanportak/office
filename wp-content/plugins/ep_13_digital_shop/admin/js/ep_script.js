jQuery(document).ready(function ($) {
    $('#ep_show_insert_link').click(function (e) {
        $('#ep_insert_film').lightbox_me({
            centered: true,
            onLoad: function () {
                var fields=$('div##ep_insert_film input');
                $(fields).eq(0).val('');
                $(fields).eq(1).val('');
                $(fields).eq(2).val('');
                $(fields).eq(4).val(0);
            }
        });
        e.preventDefault();
    });
    $("#ep_select_url").click(function () {
        tb_show('', 'media-upload.php?type=file&TB_iframe=true');
        window.send_to_editor = function (html) {
            var fileUrl = $(html).attr("href");
            $("#ep_filmurl").val(fileUrl);
            tb_remove();
        }
        return false;

    });
    $("#ep_insert_film form").submit(function(){
        var title=$(this).find('#ep_filmname').val();
        var price=$(this).find('#ep_filmprice').val();
        var link=$(this).find('#ep_filmurl').val();
        var file_id=$(this).find('#ep_file_id').val();
        $.ajax({
            type : 'post',
            url  : ep_data.ajaxurl,
            data :{
                action : 'ep_save_link',
                title  : title,
                price  : price,
                link   : link,
                file_id: file_id,
                ep_wpnonce : ep_data.ep_wpnonce_save
            },
            beforesend:function(xhr){
                $("#ep_status").css(visibility , visible);
            },
            error : function(jqXHR , textStatus , errorThrown){
                $("#ep_status").css({
                    visibility : 'visible',
                    color      : 'red',

                }).text("خطایی رخ داده است");
            },
            success :function(data,textStatus,jqXHR){
                if(data.result=='ok'){
                    $("#ep_status").css({
                        visibility : 'visible',
                        color      : 'green',
    
                    }).text("اطلاعات با موفقیت ذخیره شد");
                    update_products();
                    //ep_load_data();
                }else{
                    $("#ep_status").css({
                        visibility : 'visible',
                        color      : 'red',
    
                    }).text(data.data.message);
                }
            }

        });
        return false;
    });
    function update_products(){
        $.get(ep_data.ajaxurl + "?action=ep_full_data" , function(html){
            $("#ep_data_table tbody").html(html);
        });
    }
    $(document).on('click' , '#ep_delete' , function(){
        if(!confirm('آیا مطمءن هستید')) return false;
        var product_id = $(this).data('product_id');
        $.ajax({
            type : 'post',
            url  : ep_data.ajaxurl,
            data :{
                action     : 'ep_delete_link',
                product_id : product_id,
                ep_wpnonce_d : ep_data.ep_wpnonce_delete
            },
            error : function(jqXHR , textStatus , errorThrown){
                alert('خطایی رخ داده است');
            },
            success :function(data,textStatus,jqXHR){
              if(data.result == 'ok'){
                  update_products();
              }
            }

        });
        return false;
    });


    $(document).on('click' , '#ep_edit' , function(){
        var rows=$(this).closest('tr').find('td');
        var product_id=$(this).data('product_id');
        var product_name=$(rows).eq(1).text();
        var product_price=$(rows).eq(2).text();
        var product_url=$(rows).eq(3).text();

        $('#ep_insert_film').lightbox_me({
            centered: true,
            onLoad: function () {
                var fields=$('div#ep_insert_film input');
                $(fields).eq(0).val(product_name);
                $(fields).eq(1).val(product_price);
                $(fields).eq(2).val(product_url);
                $(fields).eq(4).val(product_id);

            }
        });

        return false;
    });

});
//13.3.3
//تا تایم ۲۳.00
