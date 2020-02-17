jQuery(document).ready(function($){
    $("#ep_upload_logo").click(function(){
        window.send_to_editor = function(html){
            var imgUrl = $('img',html).attr("src");
            $("#ep_custom_logo").val(imgUrl);
            tb_remove();
        }
        tb_show('','media-upload.php?type=image&TB_iframe=true');
        return false;
    });
    $('#ep_custom_text').wpColorPicker();
});