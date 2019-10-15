#!/usr/bin/php
<?php
    $ret = trim($argv[1]);
	$ret = explode(" ", $ret);
	$ret = array_diff($ret, array(''));
    $ret = array_values($ret);
    foreach ($ret as $elem)
        $str = $str.$elem." ";
    $str[strlen($str) - 1] = "\n";
    echo $str;
?>