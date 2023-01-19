<?php
$array1 = array("red", "green", "blue");
$array2 = array("orange", "apple", "banana");
$merge = array_merge($array1, $array2);

echo "<pre>";
print_r($array1);
echo "</pre>";

echo "<pre>";
print_r($array2);
echo "</pre>";

echo "<pre>";
print_r($merge);
echo "</pre>";
?>