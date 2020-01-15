jQuery(document).ready(function($){
    $("upload_imag_button").click(function(){
        window.send_to_editor=function(html){
            var imageUrl= $( 'img' , html).attr('src');
            console.log(imageUrl);
            tb_remove();
        }

        tb_show('' , 'media_upload.php?type=image&TB_iframe=true');
        return false;
    });
});