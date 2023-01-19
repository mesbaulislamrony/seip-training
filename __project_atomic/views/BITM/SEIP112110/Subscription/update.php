<?php
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;

$obj = new Subscription();
$obj->getID($_POST);
$obj->prepare($_POST);
$obj->update();