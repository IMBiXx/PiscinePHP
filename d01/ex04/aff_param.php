#!/usr/bin/php
<?php
$i = 0;
foreach ($argv as $elem)
{
	if ($i)
		echo "$elem\n";
	$i = 1;
}
?>