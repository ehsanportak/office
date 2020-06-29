<head>
<style>
.slider-hotel {
    padding: 20px;
}
.main-content-hotel{
    width: 90%;
    margin: 50px 63px 0px;
    background: #ebf8f9;
    height: 500px;
    box-shadow: 3px 7px 12px #cecbcb;
}
.main-content-hotel .slider-hotel{
    width: 50%;
}
.main-content-hotel .slider-hotel ul{}
.main-content-hotel .slider-hotel ul li{}
.main-content-hotel .content-hotel{
    float: right;
    width: 42%;
    text-align: right;
    padding: 2px 35px;
}
.rrslides li img{
    border-radius: 10px;
    height: 400px;
}

.room {
    background: #b4e8e4;
    width: 200px;
    text-align: center;
    padding: 5px;
    border-radius: 5px;
    margin: 0px 268px;
}
.tozihat {
    height: 280px;
    overflow-y: auto;
}


.main-content-rezerv{
    width: 90%;
    margin: 50px 63px 0px;
    background: #ebf8f9;
    height: 600px;
    box-shadow: 3px 7px 12px #cecbcb;
}
.main-content-rezerv h2{
    text-align: right;
    padding-right: 30px;
    padding-top: 20px;
}

.information {
    font-family: tahoma;
    float: right;
}
.information h3{
    text-align: right;
    padding-right: 30px;
    padding-top: 20px;
}
.information table tr{}
.information table tr td{
    padding: 22px 24px 35px 173px;
    border-bottom: 1px solid #d6d6d6;
}

.information table{
    text-align: center;
}
</style>
</head>
<?php
get_header();
get_template_part('partials/main-header');
?>
<?php if (have_posts()): ?>
<?php while (have_posts()):the_post(); ?>
<div class="main-content-hotel">

    <div class="content-hotel">
        <h2><?php the_title(); ?></h2>
        <p>آدرس هتل: استان آذربایجان شرقی ، شهر تبریر ،خیابان امام خمینی ، فلکه دانشگاه ، هتل بین المللی تبریز</p>
        <div class="room">
        <span>تعداد اطاق : 130</span>
        <span>تعداد طبقه : 5</span>
        </div>
        <div class="tozihat"><?php the_content(); ?></div>
    </div>

    <div class="slider-hotel">
        <?php get_template_part('partials/slider-hotel'); ?>
    </div>

</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="main-content-rezerv">
    <h2>رزرو  : <?php the_title(); ?></h2>
    <div class="rezerv">
    <form action="#">

    </form>
    </div>

    <div class="information">
    <h3>اطلاعات قیمت</h3>
    <table dir="rtl">
    <tr>
        <td>نوع اتاق</td>
        <td>ظرفیت</td>
        <td>صبحانه رایگان</td>
        <td>قیمت یک شب اقامت</td>
    </tr>
    <tr>
        <td>یک تخته</td>
        <td>1</td>
        <td><i class="fa fa-check"></i></td>
        <td>130000</td>
    </tr>
    <tr>
        <td>دو تخته</td>
        <td>2</td>
        <td><i class="fa fa-check"></i></td>
        <td>190000</td>
    </tr>
    <tr>
        <td>سه تخته</td>
        <td>3</td>
        <td><i class="fa fa-check"></i></td>
        <td>270000</td>
    </tr>
    <tr>
        <td>سوییت</td>
        <td>5</td>
        <td><i class="fa fa-check"></i></td>
        <td>520000</td>
    </tr>
    </table>
    </div>
</div>
<?php
get_template_part('partials/main-footer');
get_footer();