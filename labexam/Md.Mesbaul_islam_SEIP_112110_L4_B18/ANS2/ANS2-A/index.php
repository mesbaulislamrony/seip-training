<?php

$content_a = "BITM is BASIS institute of Technology & Management ";
$file = "bitm.txt";
$fopen = fopen("$file", "w");
fwrite($fopen,$content_a);
echo file_get_contents($file);