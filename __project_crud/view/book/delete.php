<?php
include_once('../../vendor/autoload.php');
use allproject\book\book;
$obj = new Book();
$id = $obj->getId($_GET);
$obj->delete();
?>