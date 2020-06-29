<!-- top bar -->
<div id="top-bar">
  <div class="container">
    <nav id="top-right-menu">
        <?php if(has_nav_menu( 'top-bar-menu' )):?>
            <?php wp_nav_menu( array(
                'theme_location'  => 'top-bar-menu'
            ))?>
        <?php else:?>
            <div class="top-bar-menu-ni-item">لطفا یک منو انتخاب کنید</div>
        <?php endif;?>
      <!-- <ul>
        <li><a href="#">وبلاگ</a></li>
        <li><a href="#">شغل ها</a></li>
        <li><a href="#">پشتیبانی</a></li>
        <li><a href="#">فارسی</a></li>
      </ul> -->
    </nav>
    <div id="top-left-social">
      <ul>
        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fa fa-telegram"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
  </div>  
</div>

<!-- end top bar -->