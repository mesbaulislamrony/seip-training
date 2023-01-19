<?php
include_once('../vendor/autoload.php');
use owncms\owncms;

$obj = new owncms();
$obj->prepare($_GET);
$obj->deletecategory();
?>