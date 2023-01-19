<?php
include_once('vendor/autoload.php');
use application\ClassFile;

$obj = new ClassFile;
echo $obj->title."<br>";
echo $obj->getProperty()."<br>";
$obj->setProperty("New properties");
echo $obj->getProperty()."<br>";
?>