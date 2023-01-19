<?php
include_once ('../../vendor/autoload.php');
use allproject\terms_and_conditions\conditions;

$obj = new conditions();

$obj->prepare($_POST);
$obj->store();
