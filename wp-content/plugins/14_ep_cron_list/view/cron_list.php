<div class="wrap">
    <?php
    echo '<pre class="lte left-align">';
    print_r(_get_cron_array());
    print_r(wp_get_schedules());
    echo '</pre>';
    ?>
    <table class="widefat">
        <thead>
            <tr>
                <th scope="col">زمان اجرای بعدی</th>
                <th scope="col">دوره اجرا</th>
                <th scope="col">نام قلاب</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $crons=_get_cron_array();
        $schedules=wp_get_schedules();
        ?>
        <?php foreach($crons as $timestamp=> $cronhook): ?>
            <?php foreach((array)$cronhook as $cronhook=> $events): ?>
                <?php foreach((array)$events as $events): ?>
                    <tr>
                        <td>
                            <?php echo date_i18n('d M Y , H:i:s', wp_next_scheduled($cronhook));?>
                        </td>
                        <td>
                            <?php
                            if($events['schedule']){
                                echo $schedules[$events['schedule']]['display'];
                            }else{
                                echo 'فقط یکبار';
                            } 
                            ?>
                        </td>
                        <td>
                            <?php echo $cronhook ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>