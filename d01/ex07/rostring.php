#!/usr/bin/php
<?php
function epur_str($src) {
    $ret = trim($src);
	$ret = explode(" ", $ret);
    $ret = array_diff($ret, array(''));
    $ret = array_values($ret);
    foreach ($ret as $elem)
        $str = $str.$elem." ";
    return $str;
}

$tab = explode(" ", epur_str($argv[1]));
array_push($tab, $tab[0]);
array_splice($tab, 0, 1);
$tab = array_diff($tab, array(''));
$tab = array_values($tab);
if ($tab)
    print_r($tab);
?>