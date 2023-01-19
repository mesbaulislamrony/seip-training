<?php
include_once('vendor/autoload.php');
use Programs\Program;

$obj = new Program();

$array = $_POST['program'];
$imploded = implode(",",$array);
$_POST['puss'] = $imploded;
$obj->prepare($_POST);
echo $obj->store();
?>