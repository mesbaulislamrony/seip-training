<?php
include_once('../../vendor/autoload.php');
use allproject\gender\gender;

$obj = new gender();
$obj->prepare($_POST);
$obj->update();