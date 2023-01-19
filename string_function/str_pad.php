<?php
/* str_pad — Pad a string to a certain length with another string */
/*
	This functions returns the input string padded on the left,
	the right, or both sides to the specified padding length.
	If the optional argument pad_string is not supplied, the input is padded with spaces,
	otherwise it is padded with characters from pad_string up to the limit.
*/

	$input = "Alien";
	echo str_pad($input, 10);                      // produces "Alien     "
	echo "<br>";
	echo str_pad($input, 30, "-=", STR_PAD_LEFT);  // produces "-=-=-Alien"
	echo "<br>";
	echo str_pad($input, 20, "_", STR_PAD_BOTH);   // produces "__Alien___"
	echo "<br>";
	echo str_pad($input,  20, "___");               // produces "Alien_"
	echo "<br>";
	echo str_pad($input,  15, "*");                 // produces "Alien"
?>