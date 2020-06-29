<?php 
get_header();
get_template_part('partials/main-header');
// get_template_part('partials/slider');
?>
<!-- start single content -->
<?php if (have_posts()): ?>
<?php while (have_posts()):the_post(); ?>
<div id="wrapper"> 
    <div class="single-content">
        <img src="<?php the_post_thumbnail_url(); ?>">
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<!-- end single content -->
<?php
get_template_part('partials/main-footer');
get_footer();
