<?php
function ft_split($str)
{
	$ret = explode(" ", $str);
	$ret = array_diff($ret, array(''));
	$ret = array_values($ret);
	sort($ret, SORT_STRING);
	return $ret;
}
?>
