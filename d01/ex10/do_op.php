#!/usr/bin/php
<?php

function do_op($n1, $n2, $op){
    if ($op == "+")
        echo $n1 + $n2."\n";
    else if ($op == "-")
        echo $n1 - $n2."\n";
    else if ($op == "*")
        echo $n1 * $n2."\n";
    else if ($op == "/")
        echo $n1 / $n2."\n";
    else if ($op == "%")
        echo $n1 % $n2."\n";
    else
        echo "Incorrect Parameters\n";
}

if ($argc != 4){
    echo "Incorrect Parameters\n";
    return ;
}
$op = array("+", "-", "/", "%", "*");
if (is_numeric($argv[1]) && is_numeric($argv[3]) && strlen($argv[2]) == 1){
        do_op($argv[1], $argv[3], $argv[2]);
}
else {
    echo "Incorrect Parameters\n";
    return ;
}
?>