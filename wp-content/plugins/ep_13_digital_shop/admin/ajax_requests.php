<?php
add_action('wp_ajax_ep_save_link', function () {
    $result = array(
        'result' => 'no',
        'data'   => array(
            'messege' => ''
        )
    );
    if (!current_user_can('manage_options')) {
        $result['data']['messege'] = 'شما اجازه ی دسترسی به این بخش را ندارید';
        wp_send_json($result);
    }
    if (!wp_verify_nonce($_POST['ep_wpnonce'], 'ep_save_link')) {
        $result['data']['messege'] = 'nonce is not currect';
        wp_send_json($result);
    }
    if (trim($_POST['title'] == '') || trim($_POST['price']) == '' || trim($_POST['link']) == '') {
        $result['data']['messege'] = 'لطفا اطلاعات را تکمیل کنید';
        wp_send_json($result);
    }
    global $wpdb;
    $table = $wpdb->prefix . 'digital_product';
    if (absint($_POST['file_id']) == 0) {
        $insert = $wpdb->insert(
            $table,
            array(
                'title' => sanitize_text_field($_POST['title']),
                'price' => absint($_POST['price']),
                'download_link' => esc_url_raw($_POST['link']),
                'create_time' => current_time('mysql')
            ),
            array('%s', '%d', '%s', '%s')
        );
        if ($insert) {
            $result['result'] = 'ok';
            $result['data']['messege'] = 'اطلاعات با موفقیت انجام شد';
            wp_send_json($result);
        } else {
            $result['data']['messege'] = 'خطا در ثبت اطلاعات';
            wp_send_json($result);
        }
    }else{
        $update=$wpdb->update(
            $table,
            array(
                'title'         =>sanitize_text_field($_POST['title']),
                'price'         =>absint($_POST['price']),
                'download_link' =>esc_url_raw($_POST['link'])
            ),
            array('id' => absint($_POST['file_id'])),
            array('%s','%d','%s'),
            array('%d')
        );
        if ($update) {
            $result['result'] = 'ok';
            $result['data']['messege'] = 'اطلاعات با موفقیت بروز شد';
            wp_send_json($result);
        } else {
            $result['data']['messege'] = 'خطا در بروزرسانی';
            wp_send_json($result);
        }
    }
});
add_action('wp_ajax_ep_full_data' , function(){
    ep_get_products();
    exit;
});
add_action('wp_ajax_ep_delete_link' , function(){
    $result = array(
        'result' => 'no',
        'data'   => array(
            'messege' => ''
        )
    );
    if (!current_user_can('manage_options')) {
        $result['data']['messege'] = 'شما اجازه ی دسترسی به این بخش را ندارید';
        wp_send_json($result);
    }
    if (!wp_verify_nonce($_POST['ep_wpnonce_d'], 'ep_delete_link')) {
        $result['data']['messege'] = 'nonce is not currect';
        wp_send_json($result);
    }
    global $wpdb;
    $table1 = $wpdb->prefix . 'digital_product';
    $table2 = $wpdb->prefix . 'digital_product_transaction';
    $product_id = absint($_POST['product_id']);
    if($wpdb->delete($table1,array('id' => $product_id),array('%d'))){
        $wpdb->delete($table1,array('file' => $product_id),array('%d'));
        $result['result'] = 'ok';
        $result['data']['messege'] = 'فایل با موفقیت حذف شد';
        wp_send_json($result);
    }else{
        $result['data']['messege'] = 'فایل حذف نشد';
        wp_send_json($result);
    }
});