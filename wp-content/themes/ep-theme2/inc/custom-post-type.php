<?php
add_action( 'init', 'sltheme_add_download_custom_post_type' );

function sltheme_add_download_custom_post_type(){

    $labels = array(
        'name'               => 'دانلود',
        'singular_name'      =>  'دانلود',
        'menu_name'          =>  'دانلود ها',
        'name_admin_bar'     => 'دانلود',
        'add_new'            => 'دانلود جدید',
        'add_new_item'       => 'آیتم دانلود جدید',
        'new_item'           => 'دانلود جدید',
        'edit_item'          => 'ویرایش دانلود',
        'view_item'          => 'نمایش دانلود',
        'all_items'          => 'تمام دانلود ها',
        'search_items'       => 'جستجوی دانلود ها',
        'parent_item_colon'  => 'دانلود ها مادر :',
        'not_found'          => 'دانلودی یافت نشد',
        'not_found_in_trash' =>'دانلود در زباله دان یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'مطالب دانلودی قالب',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'download' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-download',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    //exclude_from_search

    register_post_type( 'download', $args );


}