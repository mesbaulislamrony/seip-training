<?php

/* write a string to a file */

$file = "contents.txt";
$current = "my name rony \n";


if(file_put_contents($file, $current)){
	$contents = file_get_contents('contents.txt');
    echo $contents;
}else{
	echo "file not exists";
}
