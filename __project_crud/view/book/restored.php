<?php
include_once('../../vendor/autoload.php');
use allproject\book\book;
$obj = new Book();
$id = $obj->getID($_GET);
$obj->restored();
?>