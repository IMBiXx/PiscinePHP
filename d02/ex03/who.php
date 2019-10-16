#!/usr/bin/php
<?php
$utmpx = "/var/run/utmpx";
$fd = fopen($utmpx, "r");
$list = array();

while (($bin = fread($fd, filesize($utmpx) / 6))){
    $bin = unpack("a256user/a4id/a32line/ipid/itype/I2time", $bin);
    if (strcmp($bin['type'], "7") === 0)
        array_push($list, $bin);
}
fclose($fd);
date_default_timezone_set("Europe/Paris");
sort($list);
foreach ($list as $user) {
    echo $user['user']." ".$user['line']."  ".date("M j H:i", $user['time1'])."\n";
}
?>