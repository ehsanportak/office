<?php
/*
plugin name:فصل 13 درگاه پارس پال
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای خرید اینترنتی است
licence:GPLv2
*/

defined('ABSPATH') || exit;
define('ep_inc', plugin_dir_path(__FILE__) . 'inc/');
define('ep_admin', plugin_dir_path(__FILE__) . 'admin/');
define('ep_admin_view', plugin_dir_path(__FILE__) . 'admin/view/');
define('ep_admin_js', plugin_dir_url(__FILE__) . 'admin/js/');
define('ep_admin_css', plugin_dir_url(__FILE__) . 'admin/css/');
define('ep__css', plugin_dir_url(__FILE__) . 'css/');
define('ep__js', plugin_dir_url(__FILE__) . 'js/');

register_activation_hook(__FILE__, function () {
    global $wpdb;
    $table1 = $wpdb->prefix . 'digital_product';
    $table2 = $wpdb->prefix . 'digital_product_transaction';

    $query1 = "CREATE TABLE `{$table1}` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `price` int(40) NOT NULL,
    `download_link` varchar(250) NOT NULL,
    `creat_time` datetime NOT NULL,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1
   ";

    $query2 = "CREATE TABLE `{$table2}` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user` int(11) NOT NULL,
    `file` int(11) NOT NULL,
    `price` int(11) NOT NULL,
    `res_number` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `ref_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `paymenter` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `mobile` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `create_time` datetime NOT NULL,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   dbDelta($query1);
   dbDelta($query2);

});
// register_uninstall_hook(__FILE__ ,function(){
//     global $wpdb;
//     $table1 = $wpdb->prefix . 'digital_product';
//     $table2 = $wpdb->prefix . 'digital_product_transaction';
//     $wpdb->query("DROP TABLE IF EXISTS $table1");
//     $wpdb->query("DROP TABLE IF EXISTS $table2");
// });
if(is_admin()){
    require(ep_admin . 'admin_proccess.php');
    require(ep_admin . 'ajax_requests.php');
}
include(ep_inc . 'function.php');
include(ep_inc . 'shortcode.php');
