<?php
/*
plugin name:  فصل 15 فروشگاه کتاب
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
    add_rewrite_rule(
        'book/search/([^/]+)/?$',
        'index.php?pagename=book_search&s=$matches[1]',
        'top'
    );
    
    add_rewrite_rule(
        'book/([0-9]{1,0}+)/?$',
        'index.php?pagename=book_film&book_id=$matches[1]'
    );
}
add_action('template_redirect' , function(){
    $pageName=get_query_var('pagename');
    if($pageName == 'book_search'){
        $search=get_query_var('s');
        include(plugin_dir_path(__FILE__ ) . 'view/books.php');
        exit;
    }
    elseif($pageName == 'book_film'){
        $book_id=get_query_var('book_id');
        wp_die($book_id);
        exit;
    }
});
add_filter('query_vars' , function($vars){
    $vars[]='book_id';
    return $vars;
});