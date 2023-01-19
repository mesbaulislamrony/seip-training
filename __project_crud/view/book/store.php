<?php
include_once('../../vendor/autoload.php');
use allproject\book\book;

$obj = new Book();
$data = $obj->getForm($_POST);
$obj->store();
?>