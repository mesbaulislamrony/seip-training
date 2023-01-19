<?php
/*
	Syntax:
	if(expression){
		code to execute if the expression evaluates to true
	}elseif(expression){
		code to execute if the expression evaluates to true
	}else{
		code to execute if the expression evaluates to false
	}
*/
	$a = 10;
	$b = 20;
	if( $a > $b ){
		echo "a is bigger than b";
	}elseif( $a == $b ){
		echo "a is equal to b";
	}else{
		echo "a is smailer than b";
	}
?>