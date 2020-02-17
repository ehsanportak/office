<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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
</style>

<body>
<div class="style" style="overflow-x: auto;">
<div class="container">
<ul class="nav nav-pills">
<li class="active"><a data-toggle="pill" href="#home">صفحه 1</a></li>
<li><a data-toggle="pill" href="#menu1">صفحه 2</a></li>
<li><a data-toggle="pill" href="#menu2">صفحه 3</a></li>
<li><a data-toggle="pill" href="#menu3">صفحه 4</a></li>
</ul>

<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<h3>صفحه 1</h3>
<?php
$a = file_get_contents('http://moviesapi.ir/api/v1/movies?page=1');
$b = json_decode($a, true);
?>
<table class="tg">
<tr style="overflow-x: atuo;">
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
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][0] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][1] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][2] . '" width="100px" height="100px"></td>';

echo '<tr>';
}
echo '</div>';
?>
</table>
</div>
<div id="menu1" class="tab-pane fade">
<h3>صفحه 2</h3>
<?php
$a = file_get_contents('http://moviesapi.ir/api/v1/movies?page=2');
$b = json_decode($a, true);
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
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][0] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][1] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][2] . '" width="100px" height="100px"></td>';

echo '<tr>';
}
echo '</div>';
?>
</table>
</div>
<div id="menu2" class="tab-pane fade">
<h3>صفحه 3</h3>
<?php
$a = file_get_contents('http://moviesapi.ir/api/v1/movies?page=3');
$b = json_decode($a, true);
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
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][0] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][1] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][2] . '" width="100px" height="100px"></td>';

echo '<tr>';
}
echo '</div>';
?>
</table>
</div>
<div id="menu3" class="tab-pane fade">
<h3>صفحه 4</h3>
<?php
$a = file_get_contents('http://moviesapi.ir/api/v1/movies?page=4');
$b = json_decode($a, true);
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
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][0] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][1] . '" width="100px" height="100px"></td>';
echo '<td class="tg-0lax"><img src="' . $b['data'][$i]['images'][2] . '" width="100px" height="100px"></td>';

echo '<tr>';
}
echo '</div>';
?>
</table>
</div>
</div>
</div>
</div>
</body>

</html>
