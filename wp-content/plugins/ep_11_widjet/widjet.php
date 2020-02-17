<?php
/*
plugin name:ویدجت فصل 11 ثبت نام
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک ویدجت برای ثبت نام میسازد
licence:GPLv2
*/

defined('ABSPATH') || exit;
define('epwg_css', plugins_url('css/', __FILE__));
define('epwg_js', plugins_url('js/', __FILE__));
class epwg_test extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'epwg_id_construct',
            'فرم ثبت نام',
            array(
                'description' => 'فرمی جهت ثبت نام',
            )
        );
       
    }
  
   
    function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : 'فرم ثبت نام';
    ?>
    <p>
        <label for="<?php echo  $this->get_field_id('title'); ?>">نام</label>
        <input type="text" id="<?php echo  $this->get_field_id('title'); ?>"name="<?php echo  $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
    </p>
    <?php
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    function widget($args, $instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : 'فرم ثبت نام';
        extract($args);
        echo $before_witget; 
        echo $before_title . $title . $after_title;
        include(plugin_dir_path(__FILE__) . 'view/regester.php');
        echo $after_witget;

    }
}
add_action('widgets_init', function () {

    register_widget('epwg_test');
});
add_action('init' , function(){
    if(get_option('user_can_register')!= '1')
        return;
    $ep_err=array();
    if (isset($_POST['ep_userName'])&& wp_verify_nonce($_POST['ep_register_nonce'] , 'ep_register_nonce')){
        $username=$_POST['ep_userName'];
        $name=$_POST['ep_Name'];
        $family=$_POST['ep_family'];
        $password=$_POST['password'];
        $password_again=$_POST['password_again'];
        if (username_exists($username)){
            $ep_err[] ='نام کاربری شما موجود است';
        }
        if (!validate_username($username)){
            $ep_err[] ='نام کاربری شما موجود است';
        }
        if ($username== ""){
            $ep_err[] ='نام کاربری شما وارد نشده است';
        }
        if(empty($ep_err)){
            $new_user_id=wp_insert_user(array(
                'user_login'        => $username,
                'user_pass'         => $password,
                'user_email'        => 'ehsanportak@gmail.com',
                'first_name'        => $name,
                'last_name'         => $family,
                'user_registered'   => date('Y-m-d H:i:s'),
                'role'              => 'subscriber'
            )
        );
        if ($new_user_id){
            wp_new_user_notification($new_user_id);
            wp_clear_auth_cookie();
            wp_set_current_user($new_user_id);
            wp_set_auth_cookie($new_user_id);
            wp_safe_redirect(home_url());
            exit;
        }
        }
    }
});
?>