<?php
/*
plugin name:;کاربران
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای نمایش توابع کاربران است 
licence:GPLv2
*/
//سطح دسترسی ارسال پست را از نویسنده گرفته است
register_activation_hook(__FILE__,function(){
    add_role(
        'ep_customer',
        'مشتری فروشگاه',
        array('read')
    );
    $role= get_role('editor');
    if(!empty($role)){
    $role->remove_cap('publish_post');
    }
});
register_deactivation_hook(__FILE__,function(){
    $users = get_users(array('role' => 'ep_customer' , 'number' => 1 ));
    if(empty($users)){
        remove_role('ep_customer');
    }
    $role= get_role('editor');
    if(!empty($role)){
        $role->add_cap('publish_post');
    }
});
// add_action('the_content' , function($content){
//     // if(is_user_logged_in()){
//     //     echo 'user';
//     // }else{
//     //     echo 'no';
//     // }
//     // $args=array();
//     // $users=get_users($args);
//     // echo '<pre>';
//     // print_r($users);
//     // echo '</pre>';
// });

//سطح دسترسی ویرایش پست ها را از ادیتور میگیرد
add_filter('map_meta_cap' , function($caps , $cap , $user , $args){
    if($cap== 'edit_post' || $cap == 'delete_post'){
        $post=get_post($args[0]);
        if(author_can($post , 'manage_options')){
        $caps[]='manage_options';
        }
    }
    return $caps;
} , 10 , 4);
?>