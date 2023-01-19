<?php

$content_b = "I love my mother ";
$file = "../ANS2-A/bitm.txt";
$fopen = fopen("$file", "a");
fwrite($fopen,$content_b);
echo file_get_contents($file);