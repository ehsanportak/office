<div class="container">
<div id="main-menu-wrapper">
<div id="main-menu" class="menu">
        <?php if(has_nav_menu( 'main_header' )):?>
            <?php wp_nav_menu( array(
                'theme_location'  => 'main_header'
            ))?>
        <?php else:?>
            <div class="top-bar-menu-ni-item">لطفا یک منو انتخاب کنید</div>
        <?php endif;?>
</div>
<div id="top-search">
  <form action="" method="GET">
    <div class="form-row">
      <label for="search-input"><i class="fa fa-search"></i></label>
      <input id="search-input" name="s" type="text" placeholder="عبارت مورد نظر را جستجو کنید">
    </div>
  </form>
</div>
</div>
</div>