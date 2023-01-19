<?php
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();
$obj->prepare($_GET);
var_dump($obj->delete());