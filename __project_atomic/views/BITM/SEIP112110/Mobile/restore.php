<?php
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Mobile\Mobile;

$modelObj = new Mobile();
$data = $modelObj->prepare($_GET);
$modelObj->restore();
