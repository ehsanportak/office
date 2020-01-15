<?php
add_action("admin_menu",'epnm_plugin');
function epnm_plugin(){
    add_menu_page(
        'استایل سفارشی',
        ' تنظیمات سفارشی',
        'administrator',
        'epnm_func',
        'ehsanportak'
    );
    function ehsanportak(){
        include epnm_def . "/admin/view/style.php";
    }
}
?>