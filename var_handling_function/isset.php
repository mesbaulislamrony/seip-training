<? /* is_object — Finds whether a variable is an object  */ ?>
<?php
	//bool is_object ( mixed $var )
	$var = '';
	// This will evaluate to TRUE so the text will be printed.
	if( isset($var) ){
		echo "This var is set so It will print";
		echo "</br>";
	}
	// In the next examples we'll use var_dump to output
	// the return value of isset().
	$a = "test";
	$b = "anothertest";
	
	var_dump( isset($a) );		// TRUE
	echo "</br>";
	var_dump ( isset($a,$b) );	// TRUE
	echo "</br>";
	
	unset ($a);
	var_dump( isset($a) );		//FALSE
	echo "</br>";
	var_dump( isset($a,$b) );	//FALSE
	echo "</br>";
	
	$foo = NULL;
	var_dump( isset($foo) );	//FALSE
?>