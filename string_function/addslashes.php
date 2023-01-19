<?php
/* addslashes — Quote string with slashes */
/* string addslashes ( string $str ) */
	$str = "Is your name O'Reilly?";
	echo addslashes($str);
	// Outputs: Is your name O\'Reilly?
?>