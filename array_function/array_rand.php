<?php
$array = array("red", "green", "yellow", "blue");
$rand = array_rand($array, 3);

echo "<pre>";
print_r($array);
echo "</pre>";

echo "<pre>";
print_r($rand);
echo "</pre>";

echo $array[$rand[0]];

?>