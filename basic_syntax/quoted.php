<? 
/* single quoted and double quoted */
/*
/* double quoted can read variable.
/* single quoted can't read variable.
*/
?>
<?php
	$a = 10;
	echo "$a";
	echo "<br>";
	echo '$a';
?>