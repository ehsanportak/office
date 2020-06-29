<?php
function ep_tours_show($atts, $content = null){

if( !is_admin() ){
    echo 'heloo'; 
    // if (!is_admin()){
    // include get_template_directory() . 'tpl/hotels.php';

    // }
    }
}
add_shortcode('tours', 'ep_tours_show');