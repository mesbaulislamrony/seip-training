<?php
include_once('header.php');
include_once('../../vendor/autoload.php');
use allproject\hobby\hobby;
$obj = new Hobby();
$obj->getId($_GET);
$obj->delete();