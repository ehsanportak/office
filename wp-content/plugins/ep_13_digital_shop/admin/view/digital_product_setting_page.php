<div class="wrap">
    <form method="post" action="options.php">
        <?php
        settings_fields('ep_settings_options');
        do_settings_sections('ep_setting_parspal');
        ?>
    </form>
</div>