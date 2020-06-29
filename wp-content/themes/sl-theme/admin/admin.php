<?php
function sl_add_admin_menus(){

    //add_dashboard_page('My Plugin Dashboard', 'My Plugin', 'read', 'my-unique-identifier', 'my_plugin_function');
    add_menu_page('تنظیمات قالب', 'تنظیمات قالب','manage_options','sl-options-page','sl_options_page','dashicons-admin-generic');

}
//function my_plugin_function(){
//
//    ?>
<!--    --><?php
//}
function sl_options_page(){

    $whitelist = array('general','posts','users','help');
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'],$whitelist) ? $_GET['tab'] : 'general';

    include get_template_directory().'/tpl/admin/panel.php';

}
add_action('admin_menu','sl_add_admin_menus');