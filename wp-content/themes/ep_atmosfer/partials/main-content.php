
<!-- start main content -->

<div id="wrapper">
  <div class="main-content">
    <h2>جاذبه های گردشگری</h2>
    <!-- start content -->
    <?php if (have_posts()):?>
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>">
    <div class="content">
    <?php the_post_thumbnail('main-thumbail')?>
      <p><?php the_title(); ?></p>
    </div>
    </a>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- end content -->
  </div>
</div>


<!-- end main content -->




