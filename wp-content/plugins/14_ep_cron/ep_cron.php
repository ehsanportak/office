<?php
/*
plugin name:  زمان بندی فصل ۱۴ 
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای زمانبندی است 
licence:GPLv2
*/
defined('ABSPATH')|| exit;
register_activation_hook(__FILE__ , function(){
    wp_schedule_event(time() , 'ever10sec' , 'ep_cron_hook');
});
register_deactivation_hook(__FILE__ , function(){
    $timestamp=wp_next_scheduled('ep_cron_hook');
    wp_unschedule_event($timestamp , 'ep_cron_hook');
});
// add_action('ep_cron_hook' , function(){
    
// });
add_filter('cron_schedules' , function($schedules){
    $schedules['ever10sec']=array(
        'interval'  => 10,
        'display'   => 'evry 10 sec'
    );
    return $schedules;
});
//پستهای جدید بعد از ۱ دقیقه پاک میشوند
// add_action('publish_post' , function($post_id){
//     wp_schedule_single_event(time() + 60 , 'delete_post_after_expiration' , array($post_id));
// });
// add_action('delete_post_after_expiration' , function($post_id){
//    wp_delete_post($post_id , true);
// });
