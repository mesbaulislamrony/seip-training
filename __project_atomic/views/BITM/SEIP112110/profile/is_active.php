<?php
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\profile\profile;
$obj = new profile();
$obj->prepare($_GET);
$obj->is_active();
?>