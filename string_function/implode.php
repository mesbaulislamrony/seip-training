<?php
/* implode — Join array elements with a string */
/* string implode ( string $glue , array $pieces ) */
/* string implode ( array $pieces ) */
/* Join array elements with a glue string. */
/* implode() has two parametar. first parametar define where join a array and second parametar define array variable. */
	$array = array('lastname', 'email', 'phone');
	$comma_separated = implode(",", $array);
	echo $comma_separated;
?>