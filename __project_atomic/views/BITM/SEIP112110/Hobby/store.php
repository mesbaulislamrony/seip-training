<?php
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Hobby\Hobby;


$array = $_POST['hobby'];
$imploded = implode(",",$array);
$_POST['hobby'] = $imploded;
$obj = new Hobby();
$obj->prepare($_POST);
$obj->store();