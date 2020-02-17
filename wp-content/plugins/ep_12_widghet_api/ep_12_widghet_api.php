<?php
/*
plugin name:فصلـ12 ویدجت ای پی آی
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:ویدجت برای نمایش فیلم
licence:GPLv2
*/
defined('ABSPATH') || exit;

class ep_film_inf extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ep_film_information',
            'نمایش فیلم های برتر',
            array(
                'desceription' => 'نمایش اطلاعات فیلم'
            )
        );
     
    }
    function upload_script()
    {

    }

    function form($instance)
    {
        $title = (!isset($instance['title']) || $instance['title'] == '') ? 'فیلم ها برتر' : $instance['title'];
        $film = (!isset($instance['film']) || $instance['film'] == '') ? 'inception' : $instance['film'];
?>
    <p>
        <label for="<?php echo  $this->get_field_id('title'); ?>">نام</label>
        <input type="text" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo  $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
    </p>
    <p>
        <label for="<?php echo  $this->get_field_id('film'); ?>">فیلم</label>
        <input type="text" id="<?php echo  $this->get_field_id('film'); ?>" name="<?php echo  $this->get_field_name('film'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
    </p>

<?php
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['film'] = strip_tags($new_instance['film']);
        return $instance;
    }
    function widget($args, $instance)
    {
        $title = (!isset($instance['title']) || $instance['title'] == '') ? 'نام' : $instance['title'];
        $title = (!isset($instance['film']) || $instance['film'] == '') ? 'فیلم' : $instance['film'];
        extract($args);

        echo $before_witget . $before_title . $title . $after_title;
        $url='http://moviesapi.ir/api/v1/movies/2';
        $response=wp_remote_get($url);
        if (is_wp_error($response)){
            //error
        }elseif(wp_remote_retrieve_response_code($response) == 200){
            //show data
            $body=wp_remote_retrieve_body($response);
            //echo $body;
            $film=json_decode($body);
            //print_r($film);
            ?>
            <li>عنوان:<?php echo $film->title;?></li>
            <li>سال:<?php echo $film->year;?></li>
            <li>محصول:<?php echo $film->country;?></li>
            <li>بازیگران:<?php echo $film->actors;?></li>
            <?php
        }else{
            wp_remote_retrieve_response_message($response);
        }
        echo $after_witget;
    }
}
add_action('widgets_init', function () {

    register_widget('ep_film_inf');
});
?>