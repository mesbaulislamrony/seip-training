<?php
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;

$obj = new Subscription();
$obj->prepare($_POST);
$obj->store();