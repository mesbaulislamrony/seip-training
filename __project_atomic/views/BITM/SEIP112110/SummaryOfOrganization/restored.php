<?php
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\SummaryOfOrganization\Summary;

$obj = new Summary();
$obj->getID($_GET);
$obj->restored();