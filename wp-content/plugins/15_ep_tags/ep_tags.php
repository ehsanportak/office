<?php
/*
plugin name:  فصل 15 تگ ها
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای book_shop است 
licence:GPLv2
*/
defined('ABSPATH') || exit;
register_activation_hook(__FILE__ , 'ep_activation_function');
register_deactivation_hook(__FILE__ , 'ep_deactivation_function');

function ep_activation_function(){
    ep_add_rules();
    flush_rewrite_rules();
}
function ep_deactivation_function(){
    flush_rewrite_rules();
}
add_action('init' , 'ep_add_rules');
function ep_add_rules(){
    // add_rewrite_rule(
    //     'book/search/([^/]+)/?$',
    //     'index.php?pagename=book_search&s=$matches[1]',
    //     'top'
    // );
    add_rewrite_tag('%writer%' , '([^/]+)');
    add_permastruct('writer', 'writer/%writer%');
    add_rewrite_endpoint('format' , EP_PERMALINK );
    add_rewrite_tag('%premume%' , '([^/]+)');
}
add_action('template_redirect' , function(){
    //wp_die(get_query_var('writer') . '|page:' . get_query_var('paged'));
    // global $wp_rewrite;
    // wp_send_json($wp_rewrite);
    //wp_die(get_query_var('format'));
    if(get_query_var('format')== 'json'){
        global $wp_query;
        wp_send_json($wp_query->post);
    }
});