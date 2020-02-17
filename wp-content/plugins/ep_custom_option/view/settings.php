<div class="wrap">
    <h2>تنظیمات صفحه ورود</h2>
    <h2 class="nav-tab-wrapper">
        <a href="?page=ep_custom&tab=text" class="nav-tab <?php if ($_GET['tab']=='text') echo "nav-tab-active"; ?>">متن ها</a>
        <a href="?page=ep_custom&tab=image" class="nav-tab <?php if ($_GET['tab']=='image') echo "nav-tab-active"; ?>">تصاویر</a>
        <a href="?page=ep_custom&tab=color" class="nav-tab <?php if ($_GET['tab']=='color') echo "nav-tab-active"; ?>">رنگ ها</a>
    </h2>
<?php //settings_errors()?>
<form method="post" action="options.php">
    <?php
    if ($_GET['tab']=='text'){
    settings_fields('ep_settings_text');
    do_settings_sections('ep_settings_text');
    }elseif($_GET['tab']=='image'){
    settings_fields('ep_settings_image');
    do_settings_sections('ep_settings_image');
    }elseif($_GET['tab']=='color'){
    settings_fields('ep_settings_color');
    do_settings_sections('ep_settings_color');
    }
    submit_button();
    ?>
</form>
</div>