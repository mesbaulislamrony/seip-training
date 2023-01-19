<?php
include_once('../vendor/autoload.php');
use miniproject\mini;

$obj = new mini();
$obj->prepare($_POST);
$obj->login();
?>