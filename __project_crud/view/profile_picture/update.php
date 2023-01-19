<?php
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();


if (isset($_FILES['image'])) {
	$errors = array();
	$file_name = time().$_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_temp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];

	$extention = pathinfo($file_name, PATHINFO_EXTENSION);
	$formats = array("jpeg","jpg","png");

	if (in_array($extention, $formats) === false) {
		$errors[] = 'This extention not allowed';
	}
	if (empty($errors) == true) {
		move_uploaded_file($file_temp, "images/".$file_name);
		$_POST['image'] = $file_name;
	}else{
		print_r($errors);
	}
}
$obj->prepare($_POST);
$obj->update();
?>