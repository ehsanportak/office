<?php
/*
plugin name:  کرون لیست فصل 14
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای زمانبندی است 
licence:GPLv2
*/
defined('ABSPATH')|| exit;
add_action('admin_menu' , function(){
    add_options_page(
        'لیست وظایف',
        'لیست وظایف',
        'administrator',
        'ep_cron_list',
        function(){include(plugin_dir_path(__FILE__) . 'view/cron_list.php');}
    );
});