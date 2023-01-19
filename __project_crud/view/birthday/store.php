<?php
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$obj->prepare($_POST);
$obj->store();