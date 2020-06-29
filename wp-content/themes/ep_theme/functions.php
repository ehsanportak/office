<?php
    if(!function_exists('dd')){
        function dd($data){
            echo '<pre>';
            var_dump($data);
            die();
            echo '</pre>';
        }
    }
add_theme_support( 'title-tag' );

//theme filter
add_filter( 'show_admin_bar', '__return_false');

//theme action


add_action( 'after_setup_theme', function(){
    $menus=array(
        'top-bar-menu' => 'a menu for top bar',
        'header-menu'  => 'a menu for header',
        'footer-menu'  => 'a menu for footer'
    );
    register_nav_menus($menus);
    //add theme support
    add_theme_support( 'post-thumbnails' );
    //add image size
    add_image_size('main-thumbail', 260 , 150 );
});
function add_responsive_slider_assets(){
    if(!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',false);
        wp_enqueue_script('jquery');
    }
        
    wp_register_script( 'responsiveSlider.script', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), null , true );
    wp_enqueue_script( 'responsiveSlider.script' );

    wp_register_script('main-js', get_template_directory_uri() . '/js/main.js',array('jquery'),false,true);
    wp_enqueue_script('main-js');
    wp_localize_script('main-js','data',array('ajax_url'=> admin_url('admin-ajax.php')));
}
add_action( 'wp_enqueue_scripts' , 'add_responsive_slider_assets' );



//user functions

// $corent_user=wp_get_current_user();
add_action('wp_ajax_sample_ajax_call','wp_ajax_sample_ajax_call');

function wp_ajax_sample_ajax_call(){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    echo $name;


    wp_die();
}

function get_post_view($post_id){
    if(intval($post_id)){
        $post_view=get_post_meta( $post_id, 'views', true );
        return intval($post_view);
    }
    return 0;
    
}

function set_post_view($post_id){
    if (intval($post_id)){
        $views=get_post_view($post_id);
        $views++;
        update_post_meta( $post_id , 'views' , $views );
    }
}

//include file


include get_template_directory().'/inc/custom-post-type.php';
include get_template_directory().'/inc/meta-boxes.php';