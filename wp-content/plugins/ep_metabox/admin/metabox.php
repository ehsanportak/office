<?php
add_action( 'add_meta_boxes', 'epmb_add_metabox' );
function epmb_add_metabox(){
    add_meta_box(
      'ep_metabox',      
      'اطلاعات نویسنده',    
      function(){include( epmb_view . 'metabox_echo.php' );},   
      'post',         
      'side',         
      'low'
    );
  }
add_action('save_post', 'epmb_save_post');
add_action('save_edit', 'epmb_save_post');
function epmb_save_post($post_id){
  if(isset($_POST['epmb_select_logo'])) return;
  update_post_meta($post_id,'_epmb_update_post',esc_url_raw($_POST['epmb_logo']));
  update_post_meta($post_id,'_epmb_modares',sanitize_text_field($_POST['epmb_modares']));
  update_post_meta($post_id,'_epmb_ghesmat',sanitize_text_field($_POST['epmb_ghesmat']));
  update_post_meta($post_id,'_epmb_sath',sanitize_text_field($_POST['epmb_sath']));

}
add_action('admin_enqueue_scripts' , function($hook){
  //if($hook =='edit.php' || $hook == 'post-new.php'){
    wp_enqueue_style('thickbox');
    wp_enqueue_script('epmb_script' , epmb_js . 'upload.js' , array('jquery','media-upload','thickbox'));
  //}
});
?>