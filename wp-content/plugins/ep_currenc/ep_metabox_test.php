<?php
/*
plugin name:قیمت ارز
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک متاباکس برای نمایش قیمت ارز است   
licence:GPLv2
*/
defined('ABSPATH') || exit;

define('ep_base' , plugin_dir_path(__FILE__));
define('ep_admin' , plugin_dir_path(__FILE__) . 'admin/');
define('ep_view' , plugin_dir_path(__FILE__) . 'view/');
define('ep_admin_view' , plugin_dir_path(__FILE__) . 'admin/view/');
define('ep_js' , plugins_url('js/' , __FILE__));
define('ep_css' , plugins_url('css/' , __FILE__));



class epwg_test extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'epwg_id_construct',
            'قیمت ارز',
            array(
                'description' => 'قیمت ارز',
                'classname'   => 'epwg_form_class'
            )
        );

    }
    function form($instance)
    {
        require(ep_admin_view . 'ep_admin_view.php'); 
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function widget($args, $instance)
    {
        
        extract($args);

    ?>
        
<?php
        echo $before_witget . $before_title . $title . $after_title;
        require(ep_view . 'metabox_view.php');
        echo $after_witget;
    }
}
add_action('widgets_init', function () {
    register_widget('epwg_test');
});
wp_enqueue_style('ep_style', ep_css . 'style.css');
?>