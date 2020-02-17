<?php if (!is_user_logged_in()):?>
<div id="form">
    <form id="ep_registration_form" class="ep_form" action="" method="post">
        <fieldset>
        <p>
            <label for="ep_userName">username</label><br>
            <input type="text" name="ep_userName" id="ep_userName"/>
        </p>
        <p>
            <label for="ep_Name">name</label><br>
            <input type="text" name="ep_Name" id="ep_Name"/>
        </p>
        <p>
            <label for="ep_family">L_name</label><br>
            <input type="text" name="ep_family" id="ep_family"/>
        </p>
        <p>
            <label for="password">password</label><br>
            <input type="text" name="password" id="password"/>
        </p>
        <p>
            <label for="password_again">2password</label><br>
            <input type="text" name="password_again" id="password_again"/>
        </p>
        <input type="hidden" name="ep_register_nonce" value="<?php wp_create_nonce('ep_register_nonce'); ?>"/>
        <input type="submit" name="submit" value="ثبت نام">
        </fieldset>
    </form>
</div>
<?php else:?>
<?php
global $current_user;
get_currentuserinfo();
echo  $current_user->display_name . '     ' . 'خوش آمدید';
echo '<br><a href="'.wp_login_url().'">خروج</a>';
?>
<?php endif;?>