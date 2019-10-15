#!/usr/bin/php
<?php

function ft_error($n)
{
    if ($n == "arg")
        echo "Incorrect Parameters\n";
    else
        echo "Syntax Error\n";
}

function do_op($n1, $n2, $op){
    if ($op == "+")
        echo $n1 + $n2."\n";
    else if ($op == "-")
        echo $n1 - $n2."\n";
    else if ($op == "*")
        echo $n1 * $n2."\n";
    else if ($op == "/") {
        if ($n2 == 0)
            echo "INF\n";
        else
            echo $n1 / $n2."\n";
    }
    else if ($op == "%")
        echo $n1 % $n2."\n";
    else
        return ft_error(1);
}

if ($argc != 2){
    return (ft_error("arg"));
}
$calc = trim($argv[1]);


//check
$i = 0;
while (is_numeric($calc[$i])){
    $i++;
}

if ($calc[$i] == " ")
    $i = $i + 2;
else
    $i++;
if ($calc[$i] == " ")
    $i++;

while (is_numeric($calc[$i])){
    $i++;
}
if ($i != strlen($calc)){
    return ft_error(1);
}

 // fill

if ((count($tab = explode("+", $calc))) == 2)
    $op = "+";
else if ((count($tab = explode("-", $calc))) == 2)
    $op = "-";
else if ((count($tab = explode("*", $calc))) == 2)
    $op = "*";
else if ((count($tab = explode("/", $calc))) == 2)
    $op = "/";
else if ((count($tab = explode("%", $calc))) == 2)
    $op = "%";
else
    return ft_error(1);
if ($tab[0] == "" || $tab[1] == "")
    return ft_error(1);

do_op($tab[0], $tab[1], $op);

?>