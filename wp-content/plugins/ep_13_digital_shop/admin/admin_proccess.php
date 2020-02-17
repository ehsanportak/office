<?php
add_action('admin_menu' , function(){
    global $ep_page_hook;
    $ep_page_hook = add_menu_page(
        'فروش دیجیتال',
        'فروش دیجیتال',
        'manage_options',
        'ep_digital_product',
        function(){
            include(ep_admin_view . '/digital_product_page.php');
        }
    );
    add_submenu_page(
        'ep_digital_product',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'ep_digital_product_setting',
        function(){
            include(ep_admin_view . '/digital_product_setting_page.php');
        }

    );
    add_submenu_page(
        'ep_digital_product',
        'لیست تراکنش ها',
        'لیست تراکنش ها',
        'manage_options',
        'ep_digital_product_transactions',
        function(){
            include(ep_admin_view . '/digital_product_transactions_page.php');
        }

    );
});
add_action('admin_enqueue_scripts' , function($hook){
    global $ep_page_hook;
    if($hook != $ep_page_hook){
        return;
    }
    wp_register_script('lightboxme' , ep_admin_js . 'jquery.lightbox_me.js', array('jquery'),'1.0.0');
    wp_enqueue_script('ep_script' , ep_admin_js . 'ep_script.js' , array('jquery','lightboxme','media-upload','thickbox'),'1.0.0');
    wp_localize_script('ep_script','ep_data',array(
        'ajaxurl'  => admin_url('admin-ajax.php'),
        'ep_wpnonce_save' => wp_create_nonce('ep_save_link'),
        'ep_wpnonce_delete' => wp_create_nonce('ep_delete_link')
    ));
    wp_enqueue_style('ep_style' , ep_admin_css . '/digital_product.css' , array('thickbox'));
});
add_action('admin_init' , function(){
    add_settings_section('ep_settings_options' , 'تنظیمات پارس پال' , null , 'ep_setting_parspal');
    add_settings_field('ep_setting_merchant_id' , 'شناسه درگاه' , 'ep_setting_merchant_id_callback' , 'ep_setting_parspal' , 'ep_settings_options');
    add_settings_field('ep_setting_password' , 'رمز درگاه' , 'ep_setting_password_callback', 'ep_setting_parspal','ep_settings_options');
    register_setting('ep_settings_options','ep_pass');
    register_setting('ep_settings_options','ep_mid');
});
function ep_setting_merchant_id_callback(){
    echo '<input type="text" name="ep_mid" id="ep_mid" value="'.get_option('ep_mid','').'"/>';
}
function ep_setting_password_callback(){
    echo '<input type="text" name="ep_pass" id="ep_pass" value="'.get_option('ep_pass','').'"/>';
}