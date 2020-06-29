<?php
function sl_slider_meta_box(){

    $screens = array( 'post', 'download' );

    foreach($screens as $screen){

        add_meta_box('sl_slider_box','تصویر اسلایدر مطلب','sl_slider_box_content',$screen);

    }

};
function sl_slider_box_content($post){
    $slider_image_url = get_post_meta($post->ID,'slider_image_url',true);
    ?>
    <div class="meta-box-row">
        <input type="text" name="sl_image_slider_url" style="width: 100%;height: 30px;" class="input" value="<?php echo $slider_image_url; ?>">
    </div>
    <?php
}
function sl_slider_image_save($post_id){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! isset( $_POST['sl_image_slider_url'] ) ) {
        return;
    }

    $image_url =  sanitize_text_field( $_POST['sl_image_slider_url'] );

    update_post_meta($post_id,'slider_image_url',$image_url);


}
add_action('add_meta_boxes','sl_slider_meta_box');
add_action('save_post','sl_slider_image_save');