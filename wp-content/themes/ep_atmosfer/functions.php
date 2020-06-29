<?php
 
add_theme_support( 'title-tag' );

//theme filter
add_filter( 'show_admin_bar', '__return_false');

add_action( 'after_setup_theme', function(){
    $menus=array(
        'main_header'  => 'منوی سایت اتمسفر' 
    );
    register_nav_menus($menus);  
    //add theme support
    add_theme_support( 'post-thumbnails' );
    //add image size
    add_image_size('main-thumbail', 260 , 150 );
});
function some_function(){

    if( !is_admin() ){
 
    }
 
}
add_action('init','some_function');

include get_template_directory() . '/inc/shortcode.php';
include get_template_directory() . '/inc/costum-post-type.php';