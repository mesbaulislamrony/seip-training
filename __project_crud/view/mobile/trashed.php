<?php
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$modelObj = new Mobile();
$modelObj->prepare($_GET)->trashed();
?>