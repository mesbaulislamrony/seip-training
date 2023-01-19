<?php
include_once ('../../vendor/autoload.php');
use allproject\subscription\subscription;

$obj = new Subscription();
$obj->getID($_GET);
$obj->delete();