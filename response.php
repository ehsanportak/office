<?php
if (is_ajax()) {
if (isset($_POST["action"]) && !empty($_POST["action"])) { //بررسی اینکه مقداری در action وجود دراد یا نه
$action = $_POST["action"];
switch($action) { //این سویچ برای بررسی مقدار action است
case "test": test_function(); break;
}
}
}
//تابعی برای بررسی درخواست که آیا AJAX ی است یا نه
function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){
$return = $_POST;
//برای استفاده از داده ها می توانید از کدهای زیر استفاده کنید .
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
$return["json"] = json_encode($return);
echo json_encode($return);
}
?>