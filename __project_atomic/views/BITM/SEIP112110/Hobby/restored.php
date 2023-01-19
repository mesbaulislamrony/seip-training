<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Hobby\Hobby;
$obj = new Hobby();
$obj->getId($_GET);
$obj->restored();