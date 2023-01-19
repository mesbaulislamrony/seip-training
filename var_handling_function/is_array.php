<? /* is_array — Finds whether a variable is an array */ ?>
<?php
	// bool is_array ( mixed $var )
	
	$array = array('this','is','an array');
	echo is_array($array);
	// is_array() function condition is true
?>
<?php
	// Indexing array
	$array1 = array( 'my', 'name', 'is', 'max' );
	// Associative array
	$array2 = array( 'name'=>'max', 'address'=>'Dhaka', 'khamarbari', 'framgate' );
	
	echo "<pre>";
	print_r($array1);
	echo $array1[3];
	echo "</pre>";
	
	echo "<pre>";
	print_r($array2);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($array2);
	echo "</pre>";

?>