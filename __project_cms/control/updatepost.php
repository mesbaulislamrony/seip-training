<?php
include_once('../vendor/autoload.php');
use owncms\owncms;

$obj = new owncms();


$_POST['user_id'] = $_SESSION['user_id'];
$_POST['html_summary'] = substr(strip_tags($_POST['html_details']), 0, 50);
$_POST['summary'] = $_POST['html_summary'];
$_POST['details'] = strip_tags($_POST['html_details']);

if (!empty($_POST['cat_id'])) {
	$array = $_POST['cat_id'];
	$imploded = implode(",",$array);
	$_POST['cat_id'] = $imploded;
}else{
	$_POST['cat_id'] = '';
}
if (!empty($_POST['menu_id'])) {
	$_POST['menu_id'] = $_POST['menu_id'];
}else{
	$_POST['menu_id'] = '';
}
$obj->prepare($_POST);
$obj->update_post();
?>