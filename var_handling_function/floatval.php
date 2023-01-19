<? /* floatval — Get float value of a variable */ ?>
<?php
	// float floatval ( mixed $var )
	
	$var1 = '122.3434The';
	$var2 = 'The122.34343';
	
	$float_value_of_var = floatval($var1);
	$float_value_of_var2 = floatval($var2);
	
	echo $float_value_of_var; // 122.34343
	echo "</br>";
	echo $float_value_of_var2; // 0
	
?>