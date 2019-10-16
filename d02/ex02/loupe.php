#!/usr/bin/php
<?php

function upper_cut($tab)
{
	return ($tab[1].strtoupper($tab[2]).$tab[3]);
}
if ($argc > 1)
{
	$fd = fopen($argv[1], "r");
	$title = "/(<a.*title=\")(.*)(\">)/i";
	$link = "/(<a.*>)(.*)(<\/a)/i";
	$linkimg = "/(<a.*>)(.*)(<img)/i";
    while (!feof($fd))
        $line .= fgets($fd); 
	fclose ($fd);
	$line = preg_replace_callback("$title", "upper_cut", $line);
	$line = preg_replace_callback("$link", "upper_cut", $line);
	$line = preg_replace_callback("$linkimg", "upper_cut", $line);
	echo "$line";
}
?>