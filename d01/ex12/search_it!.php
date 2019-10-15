#!/usr/bin/php
<?php
$key = $argv[1];
$tab = $argv;
for ($i = 0; $i < 2; $i++)
    array_shift($tab);
$tab = array_reverse($tab);
foreach ($tab as $str) {
    $tmp = explode(":", $str);
    if ($tmp[0] == $key && count($tmp) == 2){
        $val = $tmp[1];
        echo $val."\n";
        return ;
    }
}
?>