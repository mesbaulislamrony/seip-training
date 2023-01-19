<?php
include_once ('../../vendor/autoload.php');
use allproject\subscription\subscription;

$obj = new Subscription();
$obj->prepare($_POST);
$obj->store();