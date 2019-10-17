#!/usr/bin/php
<?php

function upper_cut($tab)
{
	return ($tab[1].strtoupper($tab[2]).$tab[3]);
}

if ($argc > 1 && file_exists($argv[1]))
{
    if (FALSE === ($fd = fopen($argv[1], "r")))
        return ;
	$title = "/(<a.*title=\")(.*)(\">)/i";
	$link = "/(\">)(.*?)(<)/i";
	$linkimg = "/(<a.*>)(.*)(<img)/i";
	$span = "/(<span.*>)(.*)(<div)/i";
	$titlespan = "/(<.*title=\")(.*)(><span)/i";
    while (FALSE !== ($line = fgets($fd)))
        $file .= $line;
	fclose ($fd);
	$file = preg_replace_callback("$title", "upper_cut", $file);
	$file = preg_replace_callback("$link", "upper_cut", $file);
	$file = preg_replace_callback("$linkimg", "upper_cut", $file);
	$line = preg_replace_callback("$span", "upper_cut", $line);
	$line = preg_replace_callback("$titlespan", "upper_cut", $line);
	echo "$file";
}
?>