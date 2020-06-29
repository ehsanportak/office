<?php

add_action('wp_ajax_sample_ajax_call','wp_ajax_sample_ajax_call');
add_action('wp_ajax_load_more_content','sl_load_more_content');
add_action('wp_ajax_nopriv_load_more_content','load_more_content');
add_action('wp_ajax_nopriv_like_post','sl_like_post');
add_action('wp_ajax_like_post','sl_like_post');


function wp_ajax_sample_ajax_call(){

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    echo $name;

    wp_die();

}
function sl_load_more_content(){

    $page  = intval($_POST['page']);

    if($page){

        $posts_per_page  = 1;
        $offset = ($page - 1) * $posts_per_page;
        $load_more_args = array(

            'post_type' => array('post','download'),
            'offset'  => $offset,
            'posts_per_page' => $posts_per_page

        );
        $load_more_query = new WP_Query($load_more_args);
        $output_html = '';
        if($load_more_query->have_posts()):
            while($load_more_query->have_posts()):$load_more_query->the_post();

                $output_html .= '<a class="post-link" href="' .get_the_permalink().'">';
                $output_html .='<div class="post">';
                $output_html.='<div class="post-inner">';
                $output_html.='<div class="post-thumb">';
                $output_html .= get_the_post_thumbnail($load_more_query->post->ID,'main-thumbnail');
                $output_html.=' </div>';
                $output_html.=' <span class="post-title">'. get_the_title($load_more_query->post->ID).'</span>';
                $output_html.=' </div>';
                $output_html.=' <div class="post-meta">';
                $output_html.='<span><i class="fa fa-clock-o"></i>'.get_the_date('Y-m-d',$load_more_query->post->ID).'</span>';
                $output_html.=' <span><i class="fa fa-user"></i>'. get_the_author().'</span>';
                $output_html.=' <span><i class="fa fa-eye"></i>'.get_post_view(get_the_ID()).'</span>';
                $output_html.='<span><i class="fa fa-thumbs-o-up"></i>506</span>';
                $output_html.='</div></div></a>';

            endwhile;

        endif;
        $count = count($load_more_query);
        wp_reset_postdata();
        $result = array();
        $result['count'] = $count;
        $result['content'] = $output_html;
        wp_die(json_encode($result));
    }

    wp_die(json_encode(array('count'=>0,'error'=>1)));


}
function sl_like_post(){

    $post_id = intval($_POST['post_id']);

    $currentUser  = wp_get_current_user();

    if( $post_id ){

        $is_cookie_set  = isset($_COOKIE['post-'.$post_id]) && intval($_COOKIE['post-'.$post_id]) ? true : false;

        if( $is_cookie_set ){

            $result =array('success' => false,'count' => 0);
            wp_die(json_encode($result));

        }

        $likes  = set_post_likes($post_id);

        if( $likes ){

            $result =array('success' => true,'count' => $likes);
            setcookie('post-'.$post_id,1,time()+(30 * 86400),'/');
            global $wpdb,$table_prefix;

            $wpdb->insert($table_prefix.'post_likes',array('post_ID' => $post_id,'user_ID' => $currentUser->ID),array('%d','%d'));

        }else{

            $result =array('success' => false,'count' => 0);
        }

        wp_die(json_encode($result));

    }
}