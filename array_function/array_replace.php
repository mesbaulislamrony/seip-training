<?php
$array1 = array("red", "green", "blue");
$array2 = array("gray", "yellow", "black");
$replace = array_replace($array1, $array2);

echo "<pre>";
print_r($array1);
echo "</pre>";

echo "<pre>";
print_r($replace);
echo "</pre>";
?>