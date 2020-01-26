<?php
if ($_REQUEST) {
    $url = "http://moviesapi.ir/api/v1/genres/" . $_REQUEST['ganer'] . "/movies?page=" . $_REQUEST['page'] . "";
    $api = file_get_contents($url);
    $b = json_decode($api, true);
?>
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
        <?php for ($i = 0; $i <= 9; $i++) { '<tr>'?>
            <td class="tg-0lax"> <?= $b['data'][$i]['id']?>  </td>
            <td class="tg-0lax"> <?= $b['data'][$i]['title'] ?> </td>
            <td class="tg-0lax"><img src="<?= $b['data'][$i]['poster'] ?>" width="100px" height="100px"></td>
            <td class="tg-0lax"> <?= $b['data'][$i]['year'] ?> </td>
            <td class="tg-0lax"> <?= $b['data'][$i]['country'] ?> </td>
            <td class="tg-0lax"> <?= $b['data'][$i]['imdb_rating'] ?> </td>
            <?php if (count($b['data'][$i]['genres']) == 1) {
            $z = $b['data'][$i]['genres'][0];
            } elseif (count($b['data'][$i]['genres']) == 2) {
            $z = $b['data'][$i]['genres'][0] . '<br>' . $b['data'][$i]['genres'][1] . '</td>';
            } else {
            $z = $b['data'][$i]['genres'][0] . '<br>' . $b['data'][$i]['genres'][1] . '<br>' . $b['data'][$i]['genres'][1] . '</td>';
            }
            ?>
            <td class="tg-0lax"> <?= $z ?> </td>
            <?php if ((count($b['data'][$i])) > 7) {?>
            <td class='tg-0lax'><img src= <?= $b['data'][$i]['images'][0] ?> width="100px" height="100px"></td>
            <td class='tg-0lax'><img src= <?= $b['data'][$i]['images'][1] ?> width="100px" height="100px"></td>
            <td class='tg-0lax'><img src= <?= $b['data'][$i]['images'][2] ?> width="100px" height="100px"></td>
            <?php } else {?>
            <td class="tg-0lax">no-image</td>
            <td class="tg-0lax">no-image</td>
            <td class="tg-0lax">no-image</td>
            <?php } ?>
            </tr>
            <?php } ?>
       

    </table>
    <?php } ?>
