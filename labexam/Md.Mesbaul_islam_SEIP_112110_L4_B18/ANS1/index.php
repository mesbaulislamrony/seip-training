<?php

include_once('vendor/autoload.php');

use BookName\Book;

$obj = new Book;
echo "<pre>";
echo $obj->property_a."<br>";
echo $obj->property_b."<br>";
echo $obj->methoda()."<br>";
echo $obj->index()."<br>";
echo "</pre>";
