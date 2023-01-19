<?php
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Book\Book;
$obj = new Book();
$id = $obj->getID($_GET);
$obj->restored();
?>