<?php
/*
plugin name:  فصل 15 rewrite
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای rewrite است 
licence:GPLv2
*/
// add_action('template_redirect' , function(){
//     global $wp_rewrite , $wp_query;
//     print_r($wp_rewrite);
//     print_r($wp_query);
//     exit;
// });
register_activation_hook(__FILE__ , function(){
    ep_add_rules();
    flush_rewrite_rules();
});
register_deactivation_hook(__FILE__ , function(){
    flush_rewrite_rules();
});
add_action('init' , 'ep_add_rules');
function ep_add_rules(){
add_rewrite_rule('writer/([^/]+)/?$' , 'index.php?author_name=$matches[1]' , 'top');
add_rewrite_rule('writer/([^/]+)/page/?([0-9]{1,})/?$' , 'index.php?author_name=$matches[1]&page=$matches[2]' , 'top');
}