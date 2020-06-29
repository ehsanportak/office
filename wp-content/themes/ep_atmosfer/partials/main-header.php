
<!-- start top header -->

<div class="top-header">
  <div class="top-right-menu">
    <div class="logo">
    <img src="<?php echo get_template_directory_uri() . '/img/logo.png';?>" alt="">
    </div>
    <div class="top-main-menu">

      <!-- <ul>
        <li><a href="#">صفحه اصلی</a></li>
        <li><a href="#">تور ها</a></li>
        <li><a href="http://localhost/wordpress/hotels/">هتل ها</a></li>
        <li><a href="#">درباره ما</a></li>
        <li><a href="#">تماس با ما</a></li>
      </ul> -->


        <?php if(has_nav_menu( 'main_header' )):?>
            <?php wp_nav_menu( array(
                'theme_location'  => 'main_header'
            ))?>
        <?php else:?>
            <div class="top-bar-menu-ni-item">لطفا یک منو انتخاب کنید</div>
        <?php endif;?>
    </div>
  </div>
  
  <div class="top-left-menu">
      <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    <?php if( !is_user_logged_in()):?>
    
    <div class="login-rig">
      <ul>
        <li class="rigester">
          <i class="fa fa-user-o" aria-hidden="true"></i>
          <a href="#">ثبت نام</a>
        </li>
        <li class="login">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          <a href="#">ورود</a>
        </li>
      </ul>
    </div>
    <?php else:?>
    <div class="login-rig">
      <ul>
        <li class="rigester">
        <i class="fa fa-user-o" aria-hidden="true" style="color: #74c173;"></i>
        <span><?php echo wp_get_current_user()->display_name;?></span>
        </li>
      </ul>
    </div>

    <?php endif;?>
  </div>
</div>

<!-- end top header -->
