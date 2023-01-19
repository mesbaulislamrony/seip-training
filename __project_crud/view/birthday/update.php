<?php
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$data = $obj->prepare($_POST);
$obj->update();
?>