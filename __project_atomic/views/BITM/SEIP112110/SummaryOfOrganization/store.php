<?php
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\SummaryOfOrganization\Summary;

$obj = new Summary();
$obj->prepare($_POST);
$obj->store();
