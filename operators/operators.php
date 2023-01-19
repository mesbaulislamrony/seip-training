<?
	$x = 10;
	$y = 20;
	// Mathmatic Operators
	echo $x + $y;
	echo "</br>";
	echo $x - $y;
	echo "</br>";
	echo $x * $y;
	echo "</br>";
	echo $x / $y;
	echo "</br>";
	echo $x % $y;
	echo "</br>";
	echo $x ** $y;
	echo "</br>";
	
	//Assignment Operators
	$x = $y;
	echo $x,$y;
	echo "</br>";
	$x += $y;
	echo $x,$y;
	echo "</br>";
	$x -= $y;
	echo $x,$y;
	echo "</br>";
	$x *= $y;
	echo $x,$y;
	echo "</br>";
	$x /= $y;
	echo $x,$y;
	echo "</br>";
	$x %= $y;
	echo $x,$y;
	echo "</br>";
	//Comparison Operators
	#if two value are equal
	if($x==$y){
		echo "Equal";
	}else{
		echo "Not Equal";
	}
	echo "</br>";
	# if two value are equal and type are same
	if($x===$y){
		echo "Equal";
	}else{
		echo "Not Equal";
	}
	echo "</br>";
	#if two value are not equal
	if($x!=$y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if two value are not equal
	if($x<>$y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if two value are not equal  and type are not same
	if($x!==$y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if $x value large than $y value
	if($x > $y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if $x value small than $y value
	if($x < $y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if $x value large than $y value and equal $x and $y value
	if($x >= $y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	#if $x value small than $y value and equal $x and $y value
	if($x <= $y){
		echo "True";
	}else{
		echo "False";
	}
	echo "</br>";
	//Logical Operators
	// if $x and $y condition are true
	if($x=10 && $y=20){
		echo "true";
	}else{
		echo "false";
	}
	echo "</br>";
	// if $x and $y any one condition are true
	if($x=10 || $y=50){
		echo "true";
	}else{
		echo "false";
	}
	echo "</br>";
	// if $x value are not true
	if(!$x=10){
		echo "true";
	}else{
		echo "false";
	}
	
?>