jQuery(document).ready(function($){
    window.send_to_editor=function(html){
        var url= $('img',html).attr('src');
        console.log(html);
        tb_remove();
        $("#epmb_logo").val(url);
        }
        $("#epmb_select_logo").click(function(){
        tb_show('','media-upload.php?type=image&TB_iframe=true');
        return false;
        });
});
