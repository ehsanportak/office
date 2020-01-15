<?php
/*
plugin name: ep_massage
author: ehsanportak
author uri: //ehsanportak@gmail.com
version: 1.0.0
description: این افزونه برای ارسال پیام است<a href="www.google.com">دانلود </a>
*/
defined('ABSPATH') || exit;
define('epnm_dir' , plugin_dir_path(__FILE__) );
define('epnm_admin' , plugin_dir_path(__FILE__) . 'admin/');
define('epnm_css' , plugins_url('admin/css/' , __FILE__));
define('epnm_js' , plugins_url('admin/js/' , __FILE__));
define('epnm_img' , plugins_url('admin/img/' , __FILE__));
define('epnm_view' , plugin_dir_path(__FILE__) . 'admin/view/');
define('epnm_includes' , plugin_dir_path(__FILE__) . 'admin/includes/');
require_once(epnm_dir . 'ep_function.php');
register_activation_hook(__FILE__ , 'epnm_active_hook');
register_deactivation_hook(__FILE__ , 'epnm_deactive_hook');
if(is_admin()){
    require_once(epnm_admin . 'function.php');
}

?>