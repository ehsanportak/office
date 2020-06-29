<?php if (have_posts()):?>
<?php while (have_posts()) : the_post(); ?>
<a href="<?php the_permalink(); ?>">
        <div class="post">
          <div class="post-inner">
            <div class="post-type">
              <?php the_post_thumbnail('main-thumbail')?>
            </div>
            <span class="post-title"><?php the_title(); ?></span>
          </div>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i>99/1/17</span>
            <span><i class="fa fa-user"></i>احسان پورتاک</span>
            <span><i class="fa fa-thumbs-o-up"></i>107</span>
          </div>
        </div>
       </a>
<?php endwhile; ?>
<?php endif; ?>
