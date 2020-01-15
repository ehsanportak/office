<?php
/*
plugin name:ep_metabox
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک برای اطلاعات اضافی است 
licence:GPLv2
*/
defined('ABSPATH')|| exit;
define('epmb_cource_view' , plugin_dir_path(__FILE__) . 'view/');
define('epmb_admin' , plugin_dir_path(__FILE__) . 'admin/');
define('epmb_view' , plugin_dir_path(__FILE__) . 'admin/view/');
define('epmb_js' , plugins_url('admin/js/' , __FILE__));
define('epmb_css' , plugins_url('css/',__FILE__));
define('epmb_img' , plugins_url('img/',__FILE__));


//define('epmb_js' , plugins_url( 'admin/js/' , __FILE__));

if(is_admin()){
    require( epmb_admin . 'metabox.php');
}
add_filter('the_content','epmb_echo_filter');
function epmb_echo_filter($content){
    require(epmb_cource_view . 'cource_information.php');
    return $content;
}
add_action('wp_enqueue_scripts',function(){
    wp_enqueue_style('epmb_course_information', epmb_css . 'style.css');
});
?>
