<?/* define — Defines a named constant */?>
<?php
	// bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
	/*
	Note: 
	name:
		The name of the constant. 
	value:
		The value of the constant.
		In PHP 5, value must be a scalar value (integer, float, string, boolean, or NULL).
		In PHP 7, array values are also accepted. 
	case_insensitive:
		If set to TRUE, the constant will be defined case-insensitive.
		The default behavior is case-sensitive; i.e. CONSTANT and Constant represent different values. 
	*/
	define( 'NAME', 'Md. Mesbaul Islam' );
	
	// Works as of PHP 7
	//define('ANIMALS', array(
	//	'dog',
	//	'cat',
	//	'bird'
	//));
?>