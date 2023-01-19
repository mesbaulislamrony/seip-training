<?php
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();
$obj->prepare($_GET);
$obj->set_as();