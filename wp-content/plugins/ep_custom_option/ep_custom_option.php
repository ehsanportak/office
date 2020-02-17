<?php
/*
plugin name:تنظیمات دلخواه
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه تنظیمات دلخواه شما را در وردپرس اعمال میکند
licence:GPLv2
*/
defined('ABSPATH')|| exit;
define('ep_view' , plugin_dir_path(__FILE__). 'view/');
define('ep_js' , plugins_url('js/' , __FILE__));
add_action('admin_menu' , function(){
    add_options_page('صفحه ورود','صفحه ورود','manage_options','ep_custom', function(){
        require(ep_view . 'settings.php');
    });
});
add_action('admin_init' , function(){
    add_settings_section(
        'ep_setting_section_text',
        'تنظیمات صفحه ورودی',
        'ep_setting_text_callback',
        'ep_settings_text'
    );
    add_settings_section(
        'ep_setting_section_color',
        'تنظیمات صفحه ورودی',
        'ep_setting_text_callback',
        'ep_settings_color'
    );
    add_settings_field(
        'ep_setting_url',
        'تنظیمات لاگین',
        'ep_setting_url_callback',
        'ep_settings_text',
        'ep_setting_section_text',
        array(
            'با کلیک روی لینک به آدرس میروید'
        )

    );
    add_settings_field(
        'ep_custom_titile',
        'لوگو',
        'ep_title_callback',
        'ep_settings_text',
        'ep_setting_section_text',
        array(
            'با نگه داشتن ماوس روی لوگو به آدرس میروید'
        )

    );
    add_settings_field(
        'ep_custom_logo',
        'لوگو سفارشی',
        'ep_logo_callback',
        'ep_settings_text',
        'ep_setting_section_text',
        array(
            'لوگوی صفحه ورود'
        )

    );
    add_settings_field(
        'ep_setting_text',
        'رنگ متن',
        'ep_text_callback',
        'ep_settings_color',
        'ep_setting_section_color',
        array(
            'تغییر رنگ متن'
        )
    );
    register_setting(
        'ep_settings_text',
        'ep_setting_url',
        'esc_url_raw'
    ); 
    register_setting(
        'ep_settings_text',
        'ep_custom_titile',
        'sanitize_text_field'
    );
    register_setting(
        'ep_settings_text',
        'ep_custom_logo',
        'esc_url_raw'
    );
    register_setting(
        'ep_settings_color',
        'ep_custom_text'
    );
});
function ep_setting_text_callback(){
    echo '<p>شما میتوانید تنظیمات صفحه لاگین را دستکاری کنید</p>';
}
function ep_setting_url_callback($args){
    echo '<input class="ltr regular-text" type="text" name="ep_setting_url" id="ep_setting_url" value="'. get_option('ep_setting_url') .'"/>';
    echo '<p class="description"> ' . $args[0] . ' </p>';
}
function ep_title_callback($args){
    echo '<input class="ltr regular-text" type="text" name="ep_custom_titile" id="ep_custom_titile" value="'. get_option('ep_custom_titile') .'"/>';
    echo '<p class="description"> ' . $args[0] . ' </p>';
}
function ep_logo_callback($args){
    echo '<input class="ltr regular-text" type="text" name="ep_custom_logo" id="ep_custom_logo" value="'. get_option('ep_custom_logo') .'"/>';
    echo '<input class="button-secondary" type="button" name="ep_upload_logo" id="ep_upload_logo" value="upload"/>';
    echo '<p class="description"> ' . $args[0] . ' </p>';
}
function ep_text_callback($args){
    echo '<input class="ltr regular-text" type="text" name="ep_custom_text" id="ep_custom_text" data-default-color="#000000" value="'. get_option('ep_custom_text') .'"/>';
    echo '<p class="description"> ' . $args[0] . ' </p>';
}
add_action('admin_enqueue_scripts' , function(){
    global $pagenow;
    if( $pagenow == 'options-general.php'){
        wp_enqueue_script('ep_upload' , ep_js . 'upload.js' , array('jquery' , 'media-upload' , 'thickbox' , 'wp-color-picker'));
        wp_enqueue_style('thickbox');
        wp_enqueue_style('wp-color-picker');
    }
});
//بخش نمایش تنظیمات
add_filter('login_headerurl' , function(){
    return get_option('ep_setting_url');
});
add_action('login_enqueue_scripts' , function(){
    ?>
    <style type="text/css">
    .login h1 a {
        background-image: url(<?php echo get_option('ep_custom_logo' , admin_url("/images/wordpress-logo.svg?ver=20131107"))?>);
    }
    a,
    label{
        color: <?php echo get_option('ep_custom_text')?> !important;
    }
    </style>
    <?php
});