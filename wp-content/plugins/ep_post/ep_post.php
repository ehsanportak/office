<?php
/*
plugin name:ep_post
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک توضیح در مورد نویسنده اراعه میدهد
licence:GPLv2
*/
defined('ABSPATH') || die('error');
class eppost{
    public $version='1.0.0';
    public function run(){
        add_filter('the_content',array($this,'echoabuot'));
    }
    public function echoabuot($content){
        $authorimage=get_avatar(get_the_author_meta('email',32));
        $authorname=get_the_author();
        $authordesc=get_the_author_meta('description');
        $authorbox='<div>';
        $authorbox.=$authorimage;
        $authorbox.=$authorname . $authordesc;
        $authorbox.='</div>';
        return $content . $authorbox;
    }
}
$eppostt=new eppost();
$eppostt->run();
?>