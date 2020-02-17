<?php
/*
plugin name:فصل 11 کنترل کاربران
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای کنترل کاربران است
licence:GPLv2
*/
add_action('show_user_profile','ep_extra_filed');
add_action('edit_user_profile','ep_extra_filed');
function ep_extra_filed($user){
    if(!current_user_can('edit_users')) return;
        ?>
        <h3>اطلاعات اضافی</h3>
        <table class="form-table">
            <tr>
                <th><label for="ep_active_user">فعال بودن کاربر</label></th>
                <td>
                    <input type="checkbox" name="ep_active_user" value="active" <?php checked(get_user_meta($user->id , 'ep_active_user' , true), 'active')?>/>
                </td>
            </tr>
        </table>
        <?php
    
}
add_action( 'personal_options_update' , 'ep_save_extra_filed');
add_action( 'edit_user_profile_update' , 'ep_save_extra_filed');
function ep_save_extra_filed($user_id){
    if(!current_user_can('edit_users')) return;
update_user_meta($user_id , 'ep_active_user' , sanitize_text_field($_POST['ep_active_user']));    
}
add_filter('authenticate' , function ( $user , $username , $password ){
    $userObject=get_user_by('login' , $username);
    if(!$userObject) return $user;
    if (get_user_meta($userObject->ID , 'ep_active_user' , true) != 'active' && !user_can($userObject , 'edit_users')){
        $errors = new WP_Error();
        $errors->add('ep_error' , 'حساب کاربری شما مسدود است');
        return $errors;
    }
return $user;
} , 99 , 3 );
////
add_filter('user_contactmethods' , function($contactMethods){
    $contactMethods['ep_mobile']= 'شماره همراه';
    return $contactMethods;
});
add_action('register_form' , function(){
    ?>
    <p>
        <label for="ep_mobile">شماره همراه<br/>
        <input type="text" name="ep_mobile" id="ep_mobile" class="input"/></label>
    </p>
    <?php
});
add_action('user_register' , function($user_id){
    $userdata=array();
    $userdata['ID'] = $user_id;
    $userdata['ep_mobile']=sanitize_text_field($_POST['ep_mobile']);
    wp_update_user($userdata);
});
add_filter('manage_users_columns' , function($columns){
    $columns['ep_mobile']='شماره همراه';
    return $columns;
});
add_action('manage_users_custom_column' , function($value , $column_name , $user_id){
    $mobile=get_user_meta($user_id , 'ep_mobile' , true);
    if('ep_mobile' == $column_name ) return $mobile;
    return $value;
}, 10 , 3 );
?>