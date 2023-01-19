<?php
include_once('vendor/autoload.php');
use profile\profile;

$obj = new profile();
$obj->prepare($_GET);
$obj->trash();
var_dump($obj->trash());
?>