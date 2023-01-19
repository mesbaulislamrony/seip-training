<?php
/* str_split — Convert a string to an array */
/* array str_split ( string $string [, int $split_length = 1 ] ) */

	$str = "Hello Friend";

	$arr1 = str_split($str);
	$arr2 = str_split($str, 3);
	
	echo "<pre>";
	print_r($arr1);
	echo "</pre>";
	echo "<pre>";
	print_r($arr2);
	echo "</pre>";
?>