<?php
/* nl2br — Inserts HTML line breaks before all newlines in a string */
/* string nl2br ( string $string [, bool $is_xhtml = true ] ) */
/* Returns string with '<br />' or '<br>' inserted before all newlines (\r\n, \n\r, \n and \r).  */
	$str = "My name is \n Md. Mesbaul Islam";
	echo nl2br($str);

?>