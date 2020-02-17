<style>
    div#ep_must_login , #ep_product_not_found{
    background: #FFEAEA;
    padding: 20px;
    text-align: center;
    border-radius: 4px;
    border: 1px solid #E37777;
}
</style>
<?php
add_action('init' , 'ep_show_shortcode');
function ep_show_shortcode(){
    add_shortcode('digital_product' , 'ep_show_product_shortcode');
}
function ep_show_product_shortcode($atts , $content=null){
wp_enqueue_style('product-style' , ep_css . 'product-style.css');
wp_enqueue_script('product-script' , ep_js . 'product-script.js' , array('jquery'));
 
if (!is_user_logged_in()){
    $login= '<div id="ep_must_login">';
    $login.= 'شما باید لاگین کنید';
    $login.= '<a href="'.wp_login_url(get_permalink()).'">وارد شوید</a>';
    $login.='<a href="'.wp_registration_url().'">ثبت نام کنید</a>';
    $login.='</div>';
    return $login;
}
extract(shortcode_atts(array(
    'id' => 0
),$atts));
$product=ep_get_product($id);
if (!$product){
    return '<div id="ep_product_not_found">فایل مورد نظر یافت نشد</div>';
}
$user=wp_get_current_user();
if(ep_current_user_buyed_product($product->id , $user->ID )){
    return '<a class="ep_download_link" href="'.$product->download_link.'" target="_blank" title="'.$product->title.'">دانلود</a>';
}
if(isset($_POST['ep_buy_product'])){
    $price=$product->price;
    $returnPath=get_the_permalink();
    $ResNumber=uniqid();
    $Description=urlencode($product->title);
    $Paymenter=sanitize_text_field($_POST['ep_buy_paymenter']);
    $Email=sanitize_text_field($_POST['ep_buy_email']);
    $Mobile=sanitize_text_field($_POST['ep_buy_paymenter_mobile']);

}
ob_start();
?>
<div class="ep_buy_container">
    <p style="display: inline;">
    <a href="#" class="ep_buy_show">خرید</a>
    <form action="<?php echo esc_url($_SERVER['REQUEST_URL']) ?>" method="POST">
    <p>
        <lable for="ep_buy_title">محصول</lable>
        <input type="text" id="ep_buy_title" disabled value="<?php echo $product->title ;?>"/>

    </p>
    <p>
        <lable for="ep_buy_price">قیمت</lable>
        <input type="text" id="ep_buy_price" disabled value="<?php echo $product->price ;?>"/>
        
    </p>
    <p>
        <lable for="ep_buy_email">ایمیل</lable>
        <input type="text" id="ep_buy_email" disabled value="<?php echo $user->email ;?>"/>
        <input type="hidden" name="ep_buy_email" value="<?php echo $user->email ;?>">
    </p>
    <p>
        <lable for="ep_buy_paymenter">نام پرداخت کننده</lable>
        <input type="text" id="ep_buy_paymenter" name="ep_buy_paymenter"  value="<?php echo $user->display_name ;?>"/>

    </p>
    <p>
        <lable for="ep_buy_paymenter_mobile">تلفن</lable>
        <input type="text" id="ep_buy_paymenter_mobile" name="ep_buy_paymenter_mobile"  value=""/>

    </p>
    <p>
        <input type="submit" value="خرید" name="ep_buy_product" class="ep_buy_btn"/>
    </p>
    </form>
</div>
<?php
return ob_get_clean();
}
?>