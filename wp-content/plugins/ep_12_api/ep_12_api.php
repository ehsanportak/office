<?php
/*
plugin name:api
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای نمایش ای پی آی است 
licence:GPLv2
*/
defined('ABSPATH')|| exit;
add_action('admin_menu' , function(){
    add_menu_page(
        'http test',
        'http test',
        'administrator',
        'ep_http',
        function(){
            echo '<pre>';
            $result=null;
            // $url='http://moviesapi.ir/api/v1/movies/1';
            $url='http://localhost/wordpress/api_test.php';
            $args=array(
                'body' => array(
                    'name'  =>'ehsan',
                    'family'=>'portak',
                )
            );
            $result=wp_remote_head($url);
            print_r($result);
            echo '</pre>';
        }
    );
});