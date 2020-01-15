<?php
$epmb_meta_logo = get_post_meta( get_the_ID() , '_epmb_update_post' , true);
$epmb_meta_modares = get_post_meta(get_the_ID() , '_epmb_modares' , true);
$epmb_meta_ghesmat= get_post_meta(get_the_ID() , '_epmb_ghesmat' , true);
$epmb_meta_sath = get_post_meta(get_the_ID() , '_epmb_sath' , true);
?>
<div id="epmb_information<?php the_ID();?>" class="epmb_infor">
<img src="$epmb_meta_logo" width="400" height="400" <?php the_title();?>class="img_responsive" >
<div>
    <span>اطلاعات نویسنده</span>
    <ul>
        <li>نام نویسنده:<?php echo $epmb_meta_modares == ''? 'ثبت نشده' : $epmb_meta_modares;?></li>
        <li>تحصیلات:<?php echo $epmb_meta_ghesmat;?></li>
        <li>موضوع:<?php 
        if ($epmb_meta_sath == 1){
            echo 'درام';
        }elseif ($epmb_meta_sath == 2){
            echo 'جنایی';
        }else{
            echo 'احساسی';
        }
         ;?></li>
    </ul>
</div>
</div>