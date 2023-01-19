<?php
$myfile = fopen("contents.txt", "a") or die("Unable to open file!");
	$file = "contents.txt";
	file_put_contents($file, "hidd");
	echo fread($myfile,filesize("contents.txt"));
fclose($myfile);
?>