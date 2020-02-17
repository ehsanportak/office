jQuery(document).ready(function($){
    tinymce.PluginManager.add('ep_lorem',function(editor,url){
        editor.addButton('ep_lorem',{
            text    : 'recent',
            icon    : 'ep_icon',
            onclick : function(){
                //editor.insertContent('[recent]');
                editor.selection.setContent('[user]'+ editor.selection.getContent()+'[/user]');
            }
        });
    });

});