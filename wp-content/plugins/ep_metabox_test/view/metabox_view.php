<?php
$epmb_meta_genres = get_post_meta('25', '_epmb_genres', true);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<?php
$gurl=file_get_contents("http://moviesapi.ir/api/v1/genres");
$gb=json_decode($gurl);
echo '<select id="test" name="garden">';
echo '<option selected="selected" disabled>ژانر</option>';
for ($h=1;$h<21;$h++){
    echo '<option value='.$h.'>'.$gb[$h]->name.'</option>';
}
echo '</select>';
?>


<?php
if ($epmb_meta_genres == ""){
    $epmb_meta_genres = 1;
}
$url = ("http://moviesapi.ir/api/v1/genres/". $epmb_meta_genres ."/movies?page=1");
$api = file_get_contents($url);
$b = json_decode($api, true);
// print_r($b);


?>
<select id="test1" name="page">
    <option selected="selected" value="1" disabled>صفحه</option>
    <?php for($s=1;$s<=20;$s++){
        echo '<option value='. $s .'>'. $s .'</option>';
        
    }
    ?>
</select>
<?php echo $dd;?>
<div class="style" style="overflow-x: auto;">

    <div class="container">
        <div class="content">

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
                    if ($b['data'][$i]['id']== null){
                    break;
                    }else{
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
                }
                echo '</div>';
                ?>
            </table>
        </div>
    </div>
</div>
<script>
    $('#test1').change(function() {
        $('.content').children().remove();
        $.post("http://localhost/wordpress/ajax.php", {
            page: $(this).val(),
            ganer: $('#test').val(),
            defpage: <?echo $epmb_meta_genres?>
        }, function(response) {

            setTimeout("finishAjax('content', '" + escape(response) + "')", 400);

        });
        return false;

    });
    $('#test').change(function() {
        $('.content').children().remove();
        $.post("http://localhost/wordpress/ajax.php", {
            ganer: $(this).val(),
            page : $("#test1").val()
        }, function(response) {

            setTimeout("finishAjax('content', '" + escape(response) + "')", 400);

        });
        return false;

    });

    function finishAjax(id, response) {
        $('.' + id).append(unescape(response));
    }
</script>
