<?php
$epmb_meta_genres = get_post_meta('25', '_epmb_genres', true);
echo $epmb_meta_genres;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<select id="test" name="garden">
    <option selected="selected" disabled>ژانر</option>
    <option value="1">جنایی</option>
    <option value="2">درام</option>
</select>

<script>
    $("#test").change(function() {
        var str = $("#test").val();
        window.location.assign("http://localhost/wordpress/?genre_id=" + str + "&page=1");
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
                echo '<li><a href="http://localhost/wordpress/?genre_id=' . $_GET['genre_id'] . '&page=' . $i . '">' . $i . '</a></li>';
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