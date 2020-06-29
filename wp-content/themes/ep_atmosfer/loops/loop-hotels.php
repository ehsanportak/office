<?php
$all_posts_args = array(

    'post_type' => array('hotels'),
    'posts_per_page' => 9

); 

$all_posts = new WP_Query($all_posts_args);

if($all_posts->have_posts()) :?>

    <?php while($all_posts->have_posts()):$all_posts->the_post(); ?>
        <!--start post wrapper-->

        <a href="<?php echo get_the_permalink(); ?>">
            <div class="hotel">
            <?php the_post_thumbnail('main-thumbail')?>
            <div class="tozihat">
            <span class="hotel-title"><?php echo get_the_title($all_posts->post->ID); ?></span>
            <span class="span-title">رزرو این هتل %100 آنلاین و 24 ساعته می باشد</span>
            <p class="address">تهران - بزرگراه یادگار امام - سعادت آباد - بلوار پیام – میدان بهرود - خیابان عابدی - کوچه ۳۳</p>
            <p class="gheymat">شروع قیمت برای 1 شب: 662 هزار تومان</p>
            </div>
            </div>
        </a>

        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif; ?>