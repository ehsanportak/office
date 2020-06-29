<?php
//custom post types

//post type hotels
add_action( 'init', 'ep_hotels_custom_post_type' );
function ep_hotels_custom_post_type(){

    $labels = array(
        'name'               => 'هتل',
        'singular_name'      =>  'هتل',
        'menu_name'          =>  'هتل ها',
        'name_admin_bar'     => 'هتل',
        'add_new'            => 'هتل جدید',
        'add_new_item'       => 'آیتم هتل جدید',
        'new_item'           => 'هتل جدید',
        'edit_item'          => 'ویرایش هتل',
        'view_item'          => 'نمایش هتل',
        'all_items'          => 'تمام هتل ها',
        'search_items'       => 'جستجوی هتل ها',
        'parent_item_colon'  => 'هتل ها مادر :',
        'not_found'          => 'هتلی یافت نشد',
        'not_found_in_trash' =>'هتل در زباله دان یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'مطالب هتل قالب',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'hotels','with_fornt'=>true),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-admin-home',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         =>array('post_tag','category'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    //exclude_from_search

    register_post_type( 'hotels', $args );


}
//post type tours
add_action( 'init', 'ep_tours_custom_post_type' );
function ep_tours_custom_post_type(){

    $labels = array(
        'name'               => 'تور',
        'singular_name'      =>  'تور',
        'menu_name'          =>  'تور ها',
        'name_admin_bar'     => 'تور',
        'add_new'            => 'تور جدید',
        'add_new_item'       => 'آیتم تور جدید',
        'new_item'           => 'تور جدید',
        'edit_item'          => 'ویرایش تور',
        'view_item'          => 'نمایش تور',
        'all_items'          => 'تمام تور ها',
        'search_items'       => 'جستجوی تور ها',
        'parent_item_colon'  => 'تور ها مادر :',
        'not_found'          => 'توری یافت نشد',
        'not_found_in_trash' =>'تور در زباله دان یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'مطالب تور قالب',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tours','with_fornt'=>true),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-palmtree',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         =>array('post_tag','category'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    //exclude_from_search

    register_post_type( 'tours', $args ); 


}