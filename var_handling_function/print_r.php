<? /* print_r — Prints human-readable information about a variable   */ ?>
<?php
	//mixed print_r ( mixed $expression [, bool $return = false ] )
	$array = array(
		'a' => 'apple',
		'b' => 'banana',
		'c' => array(
			'x',
			'y',
			'z'
		)
	);
	echo "<pre>";
	print_r($array);
	echo "</pre>";
?>