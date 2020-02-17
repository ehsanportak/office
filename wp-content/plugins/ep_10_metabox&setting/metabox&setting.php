<?php
/*
plugin name:متاباکس و تنظیمات
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک متاباکس اختصاصی برای تنظیمات اراعه میدهد 
licence:GPLv2
*/
defined('ABSPATH') || exit;
add_action('admin_menu' , 'ep_add_menu');
function ep_add_menu(){
    global $ep_hook;
    $ep_hook=add_options_page(
        'متاباکس تنظیمات',
        'متاباکس تنظیمات',
        'manage_options',
        'ep_setting_page',
        'ep_render_setting'
    );
    add_action('load-' . $ep_hook , function(){
        global $ep_hook;
        do_action('add_meta_boxes' , $ep_hook , null);
        do_action('add_meta_boxes' . $ep_hook , null);
        add_screen_option('layout_columns' , array('max'=> 2 , 'default'=> 2));
        wp_enqueue_script('postbox');
    });
    add_action('admin_footer-' . $ep_hook , function(){
        ?>
        <script>postboxes.add_postbox_toggles(pagenow)</script>
        <?php
    });
    add_action('add_mata_boxes_' . $ep_hook , function(){
        add_meta_box('ep_save_area','ذخیره','ep_save_setting_callback',null,'side');
    });
    add_action('add_mata_boxes_' . $ep_hook , function(){
        add_meta_box('ep_setting_area','تنظیمات','ep_my_setting_callback',null,'side');
    });
}
function ep_my_setting_callback(){
    do_settings_sections('ep_setting_group');
}
function ep_save_setting_callback(){
    submit_button();
}
add_action('admin_init' , function(){
add_settings_section('ep_public_section' , 'تنظیمات عمومی', null , 'ep_setting_group');
add_settings_field('ep_setting_name' , 'نام افزونه' , 'ep_setting_name_cb' , 'ep_setting_group' , 'ep_public_section' );
register_setting('ep_setting_group','ep_name');
});
function ep_setting_name_cb(){
?>
<input type="text" name="ep_name" value="<?php echo get_option('ep_name' , 'no data')?>"/>
<?php
}

function ep_render_setting(){
    ?>
    <div class="wrap">
        <h2>صفحه تنظیمات</h2>
        <?php settings_errors()?>
        <form action="options.php" method="post">
            <?php settings_fields('ep_setting_group'); ?>
            <?php wp_nonce_field('meta-box-order' , 'meta-box-order-nonce' , false) ?>
            <?php wp_nonce_field('closedpostboxes' , 'closedpostboxesnonce' , false) ?>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-<?php echo get_current_screen()-> get_columns()== 1 ? '1' : '2'; ?>">
                <div id="post-body-content">
                    <h3>بخش عمومی تنظیمات</h3>
                    <p>this is description</p>
                </div>
                <div class="postbox-container" id="postbox-container-1">
                    <?php do_meta_boxes('','side',null);?>
                </div>
                <div class="postbox-container" id="postbox-container-2">
                    <?php do_meta_boxes('','normal',null);?>
                <?php do_meta_boxes('','advanced',null);?>
                </div>

                </div>
            </div>
        </form>
    </div>
    <?php
}
?>