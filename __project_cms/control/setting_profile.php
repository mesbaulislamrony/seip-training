<?php
include_once('../vendor/autoload.php');
use owncms\owncms;

$obj = new owncms();

if (isset($_FILES['image'])) {
	$errors = array();
	$file_name = time().$_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_temp = $_FILES['image']['tmp_name'];

	$extention = PATHINFO($file_name, PATHINFO_EXTENSION);
	$formats = array("jpg","jpeg","png");

	if (in_array($extention, $formats) === false) {
		$errors[] = "This extention not allowed";
	}
	if (empty($errors) == true) {
		move_uploaded_file($file_temp,"../images/".$file_name);
		$_POST['image'] = $file_name;
	}else{
		print_r($errors);
	}
}
$_POST['uniq_id'] = $_SESSION['uniqid'];
$_POST['user_id'] = $_SESSION['user_id'];
$obj->prepare($_POST);
$obj->update_profile();
?>