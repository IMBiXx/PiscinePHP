#!/usr/bin/php
<?php
function upper_cut($tab)
{
   return ($tab[1].strtoupper($tab[2]).$tab[3]);
}
if ($argc > 1 && file_exists($argv[1]))
{
	$file = file_get_contents($argv[1]);
	$title = "/(<.*title=\")(.*?)(\">)/i";
	$link = "/(\">)(.*?)(<)/i";
	$spaces = "/(\">\\n)(.*)(\s.<)/i";
	$aimg = "/(<a.*?>)(.*?)(<img)/i";
	$span = "/(<span.*>)(.*)(<div)/i";
	$file = preg_replace_callback("$title", "upper_cut", $file);
	$file = preg_replace_callback("$aimg", "upper_cut", $file);
	$file = preg_replace_callback("$link", "upper_cut", $file);
	$file = preg_replace_callback("$spaces", "upper_cut", $file);
	$file = preg_replace_callback("$span", "upper_cut", $file);
	echo $file;
}
?>