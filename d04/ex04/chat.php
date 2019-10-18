<?php

$path = "../private/";
$filechat = $path."chat";
$chat = unserialize(file_get_contents($filechat));
foreach ($chat as $key => $elem){
    echo '<div><p>'.$elem["login"].' dit : '.$elem["chat"].'</p></div>';
    }
?>