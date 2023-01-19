<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Hobby\Hobby;

if (array_key_exists('hobby', $_POST)) {
	$array = $_POST['hobby'];
	$imploded = implode(",",$array);
	$_POST['hobby'] = $imploded;
}
$obj = new Hobby();
$obj->getId($_POST);
$obj->prepare($_POST);
$obj->update();
var_dump($obj->update());
?>