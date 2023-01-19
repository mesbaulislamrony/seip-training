<?php
include_once ('../../vendor/autoload.php');
use allproject\subscription\subscription;

$obj = new Subscription();
$obj->getID($_POST);
$obj->prepare($_POST);
$obj->update();