<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Birthday\Birthday;

$obj = new Birthday();
$data = $obj->prepare($_GET);
$obj->delete();
?>