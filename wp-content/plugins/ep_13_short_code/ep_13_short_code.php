<?php
/*
plugin name:فصل13 کد کوتاه
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای کد کوتاه است
licence:GPLv2
*/
add_action('init' , function(){
    add_shortcode('recent-posts' , 'ep_recent_post');
    add_shortcode('recent' , 'ep_recent');
    add_shortcode('r' , 'er_red');
    add_shortcode('user' , 'ep_user');
});
function ep_user($attr , $content=null){
    if(is_user_logged_in()){
        return $content;
    }
}
function er_red($attrs , $content){
return '<span style="color:red">'.$content.'</span>';
}
function ep_recent(){
    echo '<p> sdsdsdfdfsdfsdfsdfsdf </p>';
}
// [recent-posts count=1]
// نمایش پست های اخیر
// function ep_recent_post(){
//     // return $attr['count'] .'|'. $attr['show-date'] ;
//   extract(  shortcode_atts(array(
//     'count'     => 5,
//     'show_date' => true
//     ) , $attr));
//     $count=$attr['count'];
//     ob_start();
//     echo '<ul>';
//     $the_query=new WP_Query('post_per_page='.$count);
//     if ($the_query->have_posts()){
//         while ($the_query->have_posts()){
//             $the_query->the_posts();
//             echo '<li><a href="'.get_the_permalink().'">';
//             echo get_the_title();
//             if ($show_date){
//                 echo get_the_date('d F Y');
//             }
//             echo '</a></li>';

//         }
//     }
//     echo '</ul>';
//     wp_reset_query();
//     return ob_get_clean();
// }
add_action('admin_menu' , function(){
    add_menu_page( 
        'منوی کد کوتاه',
        'کد کوتاه',
        'administrator',
        'ep_shortcode',
        'ep_shortcodee'
    );
});
function ep_shortcodee(){
    echo do_shortcode('[r]test[/r]');
    //shortcode_atts($default , $input_attrs);
//     global $shortcode_tags;
//     echo '<pre dir="ltr">';
//     var_dump($shortcode_tags);
//     echo '</pre>';
}
///////////////////////////////
// add_filter('mce_buttons' , function($buttons){
//     array_unshift($buttons , 'fontsizeselect');
//     array_unshift($buttons , 'fontselect');
//     array_push($buttons , 'styleselect');
//     return $buttons;
// });
add_filter('mce_buttons' , function($buttons){
    array_unshift($buttons , 'ep_lorem');
    return $buttons;
});
add_filter('mce_external_plugins' , 'plugin_mce');
function plugin_mce($plugins_array){
    $plugins_array['ep_lorem']=plugin_dir_url(__FILE__) . 'js/my_button.js';
    return $plugins_array;

}
add_action('admin_head' , function(){
    echo '<style type="text/css">';
    echo '.mce-ico mce-i-ep_icon{background: url('.plugin_dir_url(__FILE__). 'js/icon.png'.') no-repeat center}';
    echo '</style>';
});
////////////////////////////////
add_filter('mce_external_plugins' , function($plugins){
    $plugins['ep_advanced_Plugins']=plugin_dir_url(__FILE__). 'js/advanced_Plugins.js';
    return $plugins;
});
add_filter('mce_buttons' , function($buttons){
    array_unshift($buttons , 'ep_advanced_Plugins');
    return $buttons;
});
//تا دقیقه ی ۹
//۱۳.۲.۲
?>