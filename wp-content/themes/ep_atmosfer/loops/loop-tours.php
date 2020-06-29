<?php
$all_posts_args = array(

    'post_type' => array('tours'),
    'posts_per_page' => 9

);

$all_posts = new WP_Query($all_posts_args);
?>
        <!-- start main content -->
        <div id="wrapper">
        <div class="main-content">
            <h2>تور ها</h2>
<?php
if($all_posts->have_posts()) :?>

    <?php while($all_posts->have_posts()):$all_posts->the_post(); ?>
    
        <!-- start content -->
            <a href="<?php the_permalink(); ?>">
            <div class="content">
            <?php the_post_thumbnail('main-thumbail')?>
            <p><?php echo get_the_title($all_posts->post->ID); ?></p>
            </div>
            </a>
        <!-- end content -->


        <!-- end main content -->

    <?php endwhile; ?>
<?php endif; ?>
</div>
</div>