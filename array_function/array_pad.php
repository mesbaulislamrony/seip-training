<?php
$array = array("red", "green", "blue");
$array_pad = array_pad($array, 11, "pad");
echo "<pre>";
print_r($array_pad);
echo "</pre>";
?>