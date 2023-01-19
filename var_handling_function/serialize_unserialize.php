<? 
/* serialize — Generates a storable representation of a value   */
/*
	serialize() Convert array to string
	unserialize() Convert string to array
*/
?>
<?php
	//string serialize ( mixed $value )
	$array = array('Math','Language','Science');
	$serialize = serialize($array);
	
	echo "<pre>";
	echo "Output of Serialize data"."</br>";
	echo $serialize;
	echo "</br>";
	echo "</pre>";
	
	$unserialize = unserialize($serialize);
	echo "<pre>";
	echo "Output of Unserialize data"."</br>";
	print_r($unserialize); //Show the unserialized data
	echo "</pre>";
	
?>