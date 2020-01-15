<?php
add_action( 'add_meta_boxes', 'epmb_add_metabox' );
function epmb_add_metabox(){
    add_meta_box(
      'ep_metabox',      
      'متاباکس جدید',    
      function(){include( epmb_view . 'metabox_echo.php' );},   
      'post',         
      'default',         
      'low'
    );
  } 
add_action('admin_print_scripts-post.php' , 'epmb_post');
add_action('admin_print_scripts-post-new.php' , 'epmb_post');
function epmb_post(){
    wp_enqueue_script('epmb_script' , epmb_js . 'metabox.js' ,array('jquery','jquery-ui-tabs','media-upload','thickbox'));
}
add_action('save_post', 'epmb_save_post');
add_action('save_edit', 'epmb_save_post');
function epmb_save_post($post_id){
  if( ! isset($_POST['epmb_select_logo'])) return;
  update_post_meta($post_id,'_epmb_size_information',sanitize_text_field($_POST['epmb_size_information']));
  update_post_meta($post_id,'_epmb_vazn_information',sanitize_text_field($_POST['epmb_vazn_information']));
  update_post_meta($post_id,'_epmb_cpu_information',sanitize_text_field($_POST['epmb_cpu_information']));
  update_post_meta($post_id,'_epmb_core_information',sanitize_text_field($_POST['epmb_core_information']));
  update_post_meta($post_id,'_epmb_cpu_pro',sanitize_text_field($_POST['epmb_cpu_pro']));
  update_post_meta($post_id,'_epmb_cpu_freq',sanitize_text_field($_POST['epmb_cpu_freq']));
  update_post_meta($post_id,'_epmb_gpu_information',sanitize_text_field($_POST['epmb_gpu_information']));
  update_post_meta($post_id,'_epmb_gpu_model',sanitize_text_field($_POST['epmb_gpu_model']));
  update_post_meta($post_id,'_epmb_naghd',$_POST['epmb_naghd']);

  $images=array();
  foreach($_POST['epmb_pic'] as $images ){
    if ($images != null && $images != '') $images[]=$images;
  }
  update_post_meta($post_id , 'epmb_pic' , $images);
}
?>