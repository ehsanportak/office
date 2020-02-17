
<?php
$gurl=file_get_contents("http://moviesapi.ir/api/v1/genres");
$gb=json_decode($gurl);
echo '<select id="test" name="garden">';
echo '<option selected="selected" disabled>ژانر</option>';
for ($h=1;$h<21;$h++){
    echo '<option value='.$h.'>'.$gb[$h]->name.'</option>';
}
echo '</select>';
update_post_meta('25','_epmb_genres',sanitize_text_field($_POST['garden']));
?>