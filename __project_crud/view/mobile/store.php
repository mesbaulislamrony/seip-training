<?php
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$modelObj = new Mobile();
$data = $modelObj->prepare($_POST);
$modelObj->store();