<?php
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\profile\profile;

$obj = new profile();

if (isset($_FILES['image'])) {
	$errors = array();
	$location = 'images/';
	$image_name = time().$_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$temp_name = $_FILES['image']['tmp_name'];
	$size = $_FILES['image']['size'];
	$extension = pathinfo($image_name,PATHINFO_EXTENSION);

	$format = array('jpeg','jpg','png');
	if(in_array($extension, $format) === false){
		$errors[] = 'Wrong format';
	}
	if(empty($errors) == true){
		move_uploaded_file($temp_name,$location.$image_name);
		$_POST['image'] = $image_name;
	}
}
$obj->prepare($_POST);
$obj->update();