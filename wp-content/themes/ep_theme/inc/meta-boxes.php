<?php
function ep_slider_meta_box(){
    $screens=array('post','book');

    foreach($screens as $screen){
        add_meta_box( 'ep_slider_box', 'تصویر اسلایدر', 'ep_slider_box_content', $screen );
    }
}
function ep_slider_box_content($post){
    $slider_image_url=get_post_meta( $post->ID, 'slider_image_url', true );
?>

<div class="meta-box-row">
    <input type="text" name="ep_image_slider" style="width:100%; height:30px;" class="input" value="<?php echo $slider_image_url; ?>">
</div>

<?php
}
function ep_slider_image_save($post_id){
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }
    if(! isset($_POST['ep_image_slider'])){
        return;
    }
    $image_url=sanitize_text_field( $_POST['ep_image_slider'] );
    update_post_meta( $post_id, 'slider_image_url',$image_url);
}
add_action( 'add_meta_boxes' , 'ep_slider_meta_box');
add_action('save_post' , 'ep_slider_image_save');