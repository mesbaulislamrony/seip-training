<? /* unset — Unset a given variable */ ?>
<?php
	//void unset ( mixed $var [, mixed $... ] )
	$a = 10;
	unset($a);
	$a = 5;
	echo $a;
?>