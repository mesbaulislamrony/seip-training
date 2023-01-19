<?php
/* array_key_exists — Checks if the given key or index exists in the array */
/* bool array_key_exists ( mixed $key , array $array ) */

    $array = array('first' => 1, 'second' => 4);
	echo "<pre>";
	print_r($array);
	echo "</pre>";
	
    if (array_key_exists('first', $array)) {
            echo "The 'first' element is in the array key";
    }else{
            echo "This element not in the array key";
    }
