<?php
add_action( 'init', 'eptheme_add_download_custom_type' );

function eptheme_add_download_custom_type(){

}
$labels=array(
'name' =>'download',
'singular_name' => 'دانلود',
'menu_name' => 'دانلود ها',
'add_new' => 'دانلود جدید',
'add_new_item' => 'اضافه کردن دانلود جدید',
'new_item' => 'دانلود جدید',
'edit_item' => 'ویرایش دانلود',
'view_item' => 'نمایش دانلود',
'all_items' => 'تمام دانلود ها',
'search_items' => 'جستجوی دانلود ها',
'parent_item_colon' => 'دانلود های مادر',
'not_foand' => 'دانلودی یافت نشد',
'not_foand_in_trash' => 'دانلودی در زباله دان نسیت'
);

$args=array(
    'labels'  => $labels,
    'description'  =>  'مطالب دانلودی',
    'public'  =>  true,
    'publicly_queryable'  =>  true,
    'show_ui'  =>  true,
    'show_in_menu'  =>  true,
    'query_var'  =>  true,
    'rewrite'  =>  array('slug' => 'download'),
    'capability_type'  =>  'post',
    'menu_icon'   =>  'dashicons-download',
    'has_archive'  =>  true,
    'hierarchical'  =>  false,
    'menu_position'  =>  null,
    'supports'  =>  array('title','editor','author','thumbnail','excerpt','comments')
);

register_post_type( 'book', $args );