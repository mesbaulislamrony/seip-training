<?php
$file = "contents.txt";
if( file_exists($file) ){
	echo "This file ($file) exists";
}else{
	echo "file doesn't found";
}
?>