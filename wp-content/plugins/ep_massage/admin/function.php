<?php
add_action('admin_menu','epnm_menu');
function epnm_menu(){
    $hook_inbox=add_menu_page(
        'پیام کاربران',
        'پیام کاربران<span class="awaiting-mod count-2"><span class="">2</span></span>',
        'read',
        'epnm_inbox',
        function(){include_once (epnm_view . 'inbox.php');}
    );
    $hook_sent=add_submenu_page(
        'epnm_inbox',
        'پیام های ارسال شده',
        'پیام های ارسال شده',
        'read',
        'epnm_sent',
        function(){include_once (epnm_view . 'inbox.php');}
    );
    add_action("admin_head-{$hook_inbox}",'epnm_hook_inbox');
    add_action("admin_head-{$hook_sent}",'epnm_hook_sent');

    $hook_new=add_submenu_page(
        'epnm_inbox',
        'پیام جدید',
        'پیام جدید',
        'read',
        'epnm_new',
        function(){include_once (epnm_view . 'new.php');}
    );
    $hook_option=add_submenu_page(
        'epnm_inbox',
        'تنظیمات',
        'تنظیمات',
        'administrator',
        'epnm_option',
        function(){include_once (epnm_view . 'option.php');}
    );
    add_action( "load-{$hook_option}" , 'epnm_color_pic' );

}
function epnm_color_pic(){
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'epnm_color_picker' , epnm_js . 'color_picker.js' , array( 'jquery' , 'wp-color-picker' ) );
}

function epnm_hook_inbox(){
    echo '<<<CSS
        <style type="text/css">
        <style>
        .epnm_sms {
            border: 1px solid red;
            padding: 5px;
            margin: 5px;
            background: #ccecf5;
            }
        </style>
    CSS';   
}

function epnm_hook_sent(){
    echo '<<<CSS
        <style type="text/css">
        <style>
        .epnm_sms {
            border: 1px solid red;
            padding: 5px;
            margin: 5px;
            background: #ccecf5;
            }
        </style>
    CSS';   
}
?>