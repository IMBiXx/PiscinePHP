#!/usr/bin/php
<?php

function ft_split($str)
{
	$ret = explode(" ", $str);
	$ret = array_diff($ret, array(''));
	$ret = array_values($ret);
	sort($ret, SORT_STRING);
	return $ret;
}

foreach ($argv as $elem){
	if ($i)
		$clean = $clean.$elem." ";
	$i = 1;
	}
$clean = ft_split($clean);

foreach ($clean as $elem)
    if ($i)
        echo "$elem\n";
?>