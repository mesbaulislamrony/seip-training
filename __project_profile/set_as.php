<?php
include_once('vendor/autoload.php');
use profile\profile;

$obj = new profile();
$obj->prepare($_GET);
$obj->set_as();
?>