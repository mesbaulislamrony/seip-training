<?php
/* str_replace — Replace all occurrences of the search string with the replacement string */
/* mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] ) */
	
	$str = "My name is rony";
	$str_replace = str_replace("rony", "mesbaul", $str);
	echo $str_replace;
?>