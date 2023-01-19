<?php
include_once('../vendor/autoload.php');
use miniproject\mini;

$obj = new mini();
var_dump($_GET);
$obj->prepare($_GET);
echo $obj->is_action();
?>