<?php
include_once('../../vendor/autoload.php');
use allproject\hobby\hobby;


$array = $_POST['hobby'];
$imploded = implode(",",$array);
$_POST['hobby'] = $imploded;
$obj = new Hobby();
$obj->prepare($_POST);
$obj->store();