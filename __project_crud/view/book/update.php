<?php
include_once('../../vendor/autoload.php');
use allproject\book\book;
$obj = new Book();
$id = $obj->getId($_POST);
$data = $obj->getForm($_POST);
echo $obj->update();
?>