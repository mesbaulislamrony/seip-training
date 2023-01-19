<?php
	
	$array = array("first" =>"google", "red","green","blue","yellow");
	foreach( $array as $value ){
		echo "$value <br>";
	}
	echo "=========================="."</br>";
	foreach( $array as $key => $value ){
		echo "$key"." = "."$value";
		echo "<br>";
	}
?>