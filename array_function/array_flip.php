<?php
/* array_flip — Exchanges all keys with their associated values in an array */
/* array array_flip ( array $array ) */

	$input = array("oranges", "apples", "pears");
	$flipped = array_flip($input);
	
	echo "<pre>";
	print_r($input);
	echo "</pre>";
		
	echo "<pre>";
	print_r($flipped);
	echo "</pre>";