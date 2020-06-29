<?php
get_header();
get_template_part('partials/main-header');
?>
<!-- start search hotel -->

<div id="wrapper">
  <div class="search-hotels">
    <div class="search-hotel-top">
        <i class="fa search"></i>
        <h2>رزرو هتل</h2>
    </div>

    <div class="search-hotel-bottom">
        <form action="" method="POST" class="search-hotel">
            <button>جستجو هتل</button>
            <input type="text" placeholder="شهر محل اقامت خود را وارد نمایید">
        </form>
    </div>
</div>

<!-- end search hotel -->


<!-- start hotel content -->
<div class="h2">
  <h2>هتل ها</h2>
</div>
<div class="hotels">
  
<!-- start hotel 1 -->
<?php
include get_template_directory() . '/loops/loop-hotels.php';
?>
<!-- end hotel 1 -->

</div>
</div>
<!-- end hotel content -->
<?php
get_template_part('partials/main-footer');
get_footer();