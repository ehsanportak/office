<?php
/*
plugin name:epmb_pro_information
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک توضیح در مورد محصولات اراعه میدهد
licence:GPLv2
*/
defined('ABSPATH') || exit;
define( 'epmb_base' , plugin_dir_path(__FILE__));
define( 'epmb_admin' , plugin_dir_path(__FILE__) . 'admin/');
define( 'epmb_view' , plugin_dir_path(__FILE__) . 'view/');
define( 'epmb_admin_view' , plugin_dir_path(__FILE__) . 'admin/view/');

define( 'epmb_js' , plugins_url( 'js/' , __FILE__));
define( 'epmb_css' , plugins_url( 'css/' , __FILE__));
define( 'epmb_img' , plugins_url( 'img/' , __FILE__));


require( epmb_admin . 'meta_box.php');
add_filter('the_content' , function($content){
    ob_start();
    include(epmb_view . 'epmb_information_view.php');
    $content.=ob_get_clean();
    return $content;
} , 1);
?>