<div class="wrap">
    <h2>تنظیمات قالب سون لرن</h2>

    <div id="panel-wrapper">

        <div id="panel-inner">
            <div id="panel-sidebar">
                <ul>
                    <li><a href="<?php echo add_query_arg('tab','general'); ?>">عمومی</a></li>
                    <li><a href="<?php echo add_query_arg('tab','posts'); ?>">مطالب</a></li>
                    <li><a href="<?php echo add_query_arg('tab','users'); ?>">کاربران</a></li>
                    <li><a href="<?php echo add_query_arg('tab','help'); ?>">راهنما</a></li>
                </ul>
            </div>
            <div id="panel-content">
                <?php include get_template_directory().'/tpl/admin/'.$default_tab.'.php'; ?>
            </div>
        </div>

    </div>

</div>