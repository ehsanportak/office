jQuery(document).ready(function($){
 $("#epmb_new_tab").tabs();
 $(document).on("click" , ".epmb_button_pic" , function(){
    jQuery.data(document.body , 'prevelement' , $(this).prev());
 });
    window.send_to_editor=function(html){
        console.log(html);
        var imageurl=jQuery('img',html).Attr('scr');
        var inputtext=jQuery.data(document.body , 'prevelement')
        if(inputtext != undefined && inputtext != ''){
            inputtext.val(imageurl);

        }
        tb_remove();
    };
    tb_show('' , 'media_upload.php?type=image&TB_iframe=true');
    return false;
});