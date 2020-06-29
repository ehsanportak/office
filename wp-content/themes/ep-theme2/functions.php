
<?php
if(!function_exists('dd')){

    function dd($data){

        echo '<pre>';
        var_dump($data);
        die();
        echo '</pre>';

    }

}

add_theme_support('title-tag');

//Theme Filters
add_filter('show_admin_bar', '__return_false');
add_filter('the_content','sl_loggedin_user_content');
//theme actions
function sltheme_setup()
{


    // Reguster Main Menus
    //register_nav_menu('top-bar-menu','a menu for top bar ');
    $menus = array(
        'top-bar-menu' => 'a menu for top bar ',
        'header-menu' => 'A Menu For Header',
        'footer-menu' => 'A Menu For Footer'
    );
    register_nav_menus($menus);

    //add theme support
    add_theme_support('post-thumbnails');

    //add image sizes
    add_image_size('main-thumbnail', 260, 150);

}
function add_responsive_slider_assets()
{

    if( !is_admin() ){
        wp_deregister_script('jquery');
        wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',false);
        wp_enqueue_script('jquery');
    }
    //wp_register_style('responsiveslider.style',get_template_directory_uri().'/css/responsive.css');
    // wp_enqueue_style('responsiveslider.style');

    wp_register_script('responsiveSlider.script', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), null, true);
    wp_enqueue_script('responsiveSlider.script');

    wp_register_script('main-js',get_template_directory_uri().'/js/main.js',array('jquery'),false,true);
    wp_enqueue_script('main-js');

    $current_user =  wp_get_current_user();
    wp_localize_script('main-js','data',array(

        'ajax_url' =>  admin_url('admin-ajax.php'),

        'current_user_id' => $current_user->ID,

        'total_post_count'  => 10
    ));

}

function limitWord($string, $limit){
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
}

function sl_loggedin_user_content($content){

    //if( is_user_logged_in() ){

        //return $content;

    //}
   //str_replace( the_tags() ,'<a href="#">'.the_tags().'</a>',$content);

   //$tag = the_tags('');
   //echo $tag;
   //$tags= trim($tag);
   echo single_tag_title();
   echo str_replace( $current_tag,'reza', $content );
   
   //echo str_replace( limitWord($content, 20) , '<strong style="color:red;">'.limitWord($content, 20).'</strong>',$content);

    //return '<p>این محتوا مخصوص کاربران عضو سایت می باشد</p>';
}
add_action('after_setup_theme', 'sltheme_setup');
add_action('wp_enqueue_scripts', 'add_responsive_slider_assets');

// user functions

//$current_user = wp_get_current_user();
//    update_user_meta($current_user->ID,'mobile_number','09123456789');
//    $mobile_number = get_user_meta($current_user->ID,'mobile_number',true);
//    echo $mobile_number;


function get_post_view($post_id){

    if(intval($post_id)){

        $post_view = get_post_meta($post_id,'views',true);
        return intval($post_view);

    }

    return 0;

}
function set_post_view($post_id){

    if( intval( $post_id ) ){

        $views = get_post_view($post_id);
        $views++;
        update_post_meta($post_id,'views',$views);
    }

}

function get_post_likes($post_id){

    if(intval($post_id)){

        $post_likes = get_post_meta($post_id,'likes',true);
        return intval($post_likes);

    }

    return 0;

}
function set_post_likes($post_id){

    if( intval( $post_id ) ){

        $likes = get_post_likes($post_id);
        $likes++;
        update_post_meta($post_id,'likes',$likes);

        return $likes;
    }
    return 0;

}

// include filess



include get_template_directory() . '/inc/custom-post-type.php';
include get_template_directory() . '/inc/meta-boxes.php';
include get_template_directory() . '/inc/ajax.php';

