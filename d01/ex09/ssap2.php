#!/usr/bin/php
<?php
function ft_split($str)
{
	$ret = explode(" ", $str);
	$ret = array_diff($ret, array(''));
	$ret = array_values($ret);
	sort($ret, SORT_STRING | SORT_FLAG_CASE);
	return $ret;
}

foreach ($argv as $elem)
    if ($elem != $argv[0])
		$clean = $clean.$elem." ";
$clean = ft_split($clean);


$tab_alpha = array();
$tab_num = array();
$tab_ascii = array();
foreach ($clean as $elem){
    if ($elem != $argv[0]){
        if (is_numeric($elem)){
            array_push($tab_num, $elem);
        }
        else if (ctype_alpha($elem)) {
            array_push($tab_alpha, $elem);
        }
        else
            array_push($tab_ascii, $elem);
    }
}
$ret = array_merge($tab_alpha, $tab_num, $tab_ascii);
foreach ($ret as $elem)
    echo "$elem\n";
?>
