<?php
include_once("vendor/autoload.php");
use Programs\Program;

$obj = new Program();
$obj->prepare($_GET);
$value = $obj->trashed();
?>