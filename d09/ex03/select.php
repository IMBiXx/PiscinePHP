<?php
$file = json_encode(str_getcsv(file_get_contents("list.csv"), "\n"));
print_r($file);
?>