<?php
include_once ('../../vendor/autoload.php');
use allproject\summaryOfOrganization\summary;

$obj = new Summary();
$obj->getID($_POST);
$obj->prepare($_POST);
$obj->update();