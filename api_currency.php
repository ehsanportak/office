<?php
$a = file_get_contents("https://currency.jafari.pw/json");
$b = json_decode($a);
print_r($b);
echo $b->LastModified;
echo $b->Currency[0]->Code;
?>