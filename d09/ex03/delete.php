<?php
$key = $_POST["id"];
$filename = "list.csv";
$file = explode("\n", file_get_contents("list.csv"));
$i = 0;
foreach ($file as &$elem) {
    if (intval($elem) == $key) {
        break ;
    }
    $i++;
}
file_put_contents($filename,str_replace($file[$i]."\n",'',file_get_contents($filename)));
?>