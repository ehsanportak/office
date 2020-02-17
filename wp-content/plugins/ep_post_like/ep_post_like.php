<?php
/*
plugin name:لایک کردن پست ها
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای لایک کردن است 
licence:GPLv2
*/
defined('ABSPATH')|| exit;
define('ep_images',plugin_dir_url(__FILE__) . 'images/');
define('ep_js',plugin_dir_url(__FILE__) . 'js/');
class ep_post_like{
    public function __construct()
    {
        add_filter('the_content' , array(&$this , 'add_post_like'));
        add_action('wp_head' , array(&$this , 'add_style'));
        add_action('wp_enqueue_scripts' , array(&$this , 'add_script'));
        add_action('wp_ajax_ep_post_like' , array(&$this , 'add_like'));
    }
    public function add_post_like($content){
        $divlike='<div id="post-like">';
        $divlike.='<img src="'.ep_images  .'download1.jpeg"/>';
        $divlike.='<span class="post_like_result">با موفقیت انجام شد</span>';
        $divlike.='</div>';
        return $content . $divlike ;

    }
    public function add_style(){
        ?>
        <style type="text/css">
        #post-like img{
            cursor:pointer;
        }
        </style>
        <?php
    }
    public function add_script(){
        wp_enqueue_script('ep_postlike', ep_js . 'script.js' , array('jquery'),false , false );
        wp_localize_script('ep_postlike', 'ep_data' ,  array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));
    }
    public function add_like(){
        wp_send_json($_POST);
    }
}
new ep_post_like();