<?php
include_once('../../vendor/autoload.php');
use allproject\city\city;

$obj = new City();
$obj->prepare($_POST);
$obj->store();
?>