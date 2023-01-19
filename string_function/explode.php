<?php
/* explode — Split a string by string */
/* array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) */
/* explode() has two parametar. first parametar define where split a string and second parametar define string variable. */

	$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
	$pieces = explode(" ", $pizza);
	echo "<pre>";
	print_r($pieces);
	echo "</pre>";
?>