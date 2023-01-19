<?php
include_once ('../../vendor/autoload.php');
use allproject\summaryOfOrganization\summary;

$obj = new Summary();
$obj->prepare($_POST);
$obj->store();
