<?php
/*
plugin name:ep_widjet_test
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک ابزارک اراعه میدهد
licence:GPLv2
*/
defined('ABSPATH') || exit;
define('epwg_css', plugins_url('css/', __FILE__));
define('epwg_js', plugins_url('js/', __FILE__));
class epwg_test extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'epwg_id_construct',
            'نویسنده ی برتر',
            array(
                'description' => 'سابقه نویسندگان برتر',
                'classname'   => 'epwg_form_class'
            )
        );
        if (is_active_widget(false, false, $this->id_base)) {
            add_action('wp_enqueue_scripts', array(&$this, 'script'));
            add_action('admin_enqueue_scripts', array(&$this, 'upload_script'));
        }
    }
    function upload_script()
    {
        wp_enqueue_script('epwg_upload_image', epwg_js . 'upload.js', array('jquery', 'media_upload', 'thickbox'));
    }
    function script()
    {
        wp_enqueue_style('epwg_style', epwg_css . 'style.css');
        wp_enqueue_style('thickbox');
    }
    function form($instance)
    {
        $title = (!isset($instance['title']) || $instance['title'] == '') ? 'نویسندگان برتر' : $instance['title'];
        $order_by = (!isset($instance['order_by']) || $instance['order_by'] == '') ? 'نویسندگان برتر' : $instance['order_by'];
        $order = (!isset($instance['order']) || $instance['order'] == '') ? 'نویسندگان برتر' : $instance['order'];
        $count = (!isset($instance['count']) || $instance['count'] == '') ? 'نویسندگان برتر' : $instance['count'];

?>
        <p>
            <label for="<?php echo  $this->get_field_id('title'); ?>">نام</label>
            <input type="text" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo  $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order_by'); ?>">بر اساس</label>
            <select value="<?php echo esc_attr($order_by); ?>" id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('order_by'); ?>">
                <option value="registered" <?php selected($order_by, 'regestered'); ?>>تاریخ ثبت نام </option>
                <option value="post_conmt" <?php selected($order_by, 'post_count'); ?>> تعداد مطلب </option>
                <option value="display_name" <?php selected($order_by, 'display_name'); ?>> حروف الفبا </option>
            </select>
        </p>
        <p>
            <input type="button" id="upload_imag_button button_primary" value="آپلود تصویر" />
        </p>
    <?php
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    function widget($args, $instance)
    {
        $title = (!isset($instance['title']) || $instance['title'] == '') ? 'نویسندگان برتر' : $instance['title'];
        $title = (!isset($instance['order_by']) || $instance['order_by'] == '') ? 'register' : $instance['order_by'];
        $title = (!isset($instance['order']) || $instance['order'] == '') ? 'register' : $instance['order'];
        $title = (!isset($instance['count']) || $instance['count'] == '') ? 'register' : $instance['count'];
        $title = (!isset($instance['header']) || $instance['header'] == '') ? 'register' : $instance['header'];

        extract($args);

        $url = 1;
    ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style type="text/css">
            .tg {
                border-collapse: collapse;
                border-spacing: 0;
            }

            .tg td {
                font-family: Arial, sans-serif;
                font-size: 14px;
                padding: 10px 5px;
                border-style: solid;
                border-width: 1px;
                overflow: hidden;
                word-break: normal;
                border-color: black;
            }

            .tg th {
                font-family: Arial, sans-serif;
                font-size: 14px;
                font-weight: normal;
                padding: 10px 5px;
                border-style: solid;
                border-width: 1px;
                overflow: hidden;
                word-break: normal;
                border-color: black;
            }

            .tg .tg-0pky {
                border-color: inherit;
                text-align: left;
                vertical-align: top
            }

            .tg .tg-0lax {
                text-align: left;
                vertical-align: top
            }

            .error {
                color: #FF0000;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <select id="test" name="garden">
        <option selected="selected" disabled>ژانر</option>
            <option  value="1">جنایی</option>
            <option  value="2">درام</option>
        </select>

        <script>
            $("#test").change(function() {
                var str = $("#test").val();
                window.location.assign("http://localhost/wordpress/?genre_id="+str+"&page=1");
            });
        </script>
        <?php
        $url = ("http://moviesapi.ir/api/v1/genres/" . $_GET['genre_id'] . "/movies?page=" . $_GET['page'] . "");
        ?>
        <div class="style" style="overflow-x: auto;">

            <div class="container">
                <ul class="pagination">
                    <?php
                    $api = file_get_contents($url);
                    $b = json_decode($api, true);
                    for ($i = 1; $i < 4; $i++) {
                        echo '<li><a href="http://localhost/wordpress/?genre_id=' . $_GET['genre_id'] . '&page='. $i.'">' . $i . '</a></li>';
                    }

                    ?>
                </ul>
                <table class="tg">
                    <tr>
                        <th class="tg-0pky">id</th>
                        <th class="tg-0pky">title</th>
                        <th class="tg-0lax">poster</th>
                        <th class="tg-0pky">year</th>
                        <th class="tg-0pky">country</th>
                        <th class="tg-0pky">imdb_rating</th>
                        <th class="tg-0pky">genres</th>
                        <th class="tg-0pky">image</th>
                        <th class="tg-0pky">image</th>
                        <th class="tg-0pky">image</th>
                    </tr>
                    <?php
                    for ($i = 0; $i <= 9; $i++) {
                        echo '<tr>';
                        echo '<td class="tg-0lax"> ' . $b['data'][$i]['id'] . '</td>';
                        echo '<td class="tg-0lax"> ' . $b['data'][$i]['title'] . '</td>';
                        echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['poster'] . '" width="100px" height="100px"></td>';
                        echo '<td class="tg-0lax"> ' . $b['data'][$i]['year'] . '</td>';
                        echo '<td class="tg-0lax"> ' . $b['data'][$i]['country'] . '</td>';
                        echo '<td class="tg-0lax"> ' . $b['data'][$i]['imdb_rating'] . '</td>';
                        if (count($b['data'][$i]['genres']) == 1) {
                            $z = $b['data'][$i]['genres'][0];
                        } elseif (count($b['data'][$i]['genres']) == 2) {
                            $z = $b['data'][$i]['genres'][0] . '<br>' . $b['data'][$i]['genres'][1] . '</td>';
                        } else {
                            $z = $b['data'][$i]['genres'][0] . '<br>' . $b['data'][$i]['genres'][1] . '<br>' . $b['data'][$i]['genres'][1] . '</td>';
                        }
                        echo '<td class="tg-0lax"> ' . $z . '</td>';
                        if ((count($b['data'][$i])) > 7) {
                            echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][0] . '" width="100px" height="100px"></td>';
                            echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][1] . '" width="100px" height="100px"></td>';
                            echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][2] . '" width="100px" height="100px"></td>';
                        } else {
                            echo '<td class="tg-0lax">no-image</td>';
                            echo '<td class="tg-0lax">no-image</td>';
                            echo '<td class="tg-0lax">no-image</td>';
                        }
                        echo '<tr>';
                    }
                    echo '</div>';
                    ?>
                </table>
            </div>
        </div>
        </body>

        </html>

<?php
        echo $before_witget . $before_title . $title . $after_title;
        $user = new WP_User_Query(array(
            'order_by'  => 'post_count',
            'order'     => 'desc',
            'fields'    => array('display_name', 'user_email', 'id'),
            'number'    => 10
        ));
        foreach ($user->get_results() as $user) {
            echo '<div>';
            echo '<a href"' . get_author_posts_url($user->id) . '">' . $user->display_name . ' (' . count_user_posts($user->id) . ') </a>';
            echo '</div>';
        }
        echo $after_witget;
    }
}
add_action('widgets_init', function () {

    register_widget('epwg_test');
});
add_action('wp_dashboard_setup', function () {
    // global $wp_meta_baxes;
    // ob_start();
    // echo '<pre style="text-align:left; direction:ltr;">';
    // print_r($wp_meta_baxes);
    // echo '</pre>';
    // wp_die(ob_get_clean()); 
    wp_add_dashboard_widget(
        'epwg_dashboard_new',
        'اخبار ورزشی',
        'epwg_dashboard_new_func'
    );
});
function epwg_dashboard_new_func()
{
    echo '<div id="tgju-data"></div><script>var tgju_params = { type: "simple", items: ["sekeb","sekee","nim","rob","gerami"], columns: ["diff","time"], placeholder: "tgju-data", token: "webservice" };</script><script src="https://api.tgju.online/v1/widget"></script>';
}
?>