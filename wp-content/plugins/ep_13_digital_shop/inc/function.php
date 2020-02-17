<?php
function ep_get_products(){
    global $wpdb;
    $table = $wpdb->prefix . 'digital_product';
    $query="SELECT * FROM $table ORDER BY id DESC";
    $result= $wpdb->get_results($query,OBJECT);
    if(!empty($result)){
        foreach($result as $product){
            ?>
            <tr>
                <td><?php echo $product->id;?></td>
                <td><?php echo $product->title;?></td>
                <td><?php echo $product->price;?></td>
                <td><?php echo esc_url($product->download_link);?></td>
                <td><a href="<?php echo esc_url($product->download_link);?>" target="_blank">دانلود</a></td>
                <td><?php echo $product->creat_time;?></td>
                <td>[digital_product id=<?php echo $product->id;?>]</td>
                <td>
                    <?php echo '<a href="#" class="ep_delete" data_product_id="'. $product->id .'">حذف</a>';?>|
                    <?php echo '<a href="#" class="ep_edit" data_product_id="'. $product->id .'">ویرایش</a>';?>
                </td>
            </tr>
            <?php
        }
    }else{
        echo '<tr><td colspan="8">محصولی یافت نشد</td></tr>';
    }
}
function ep_get_product($product_id){
global $wpdb;
$table = $wpdb->prefix . 'digital_product';
return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE id = %d" , $product_id),OBJECT);
}
function ep_current_user_buyed_product($product_id , $user_id){
    global $wpdb;
    $table=$wpdb->prefix . 'digital_product_transaction';
    return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE file =%d AND user = %d AND ref_number <> 'null'", $product_id ,$user_id));
}