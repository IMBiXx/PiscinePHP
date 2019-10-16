#!/usr/bin/php
<?php

function make_tab(){
    $i = 0;
    $tab = array();
    while (FALSE !== ($line = fgets(STDIN))){
        if ($i !== 0){
        $tab = array_merge($tab, explode(";", $line));
    }
    $i++;
    }
    print_r($tab);
}

function moyenne(){

}


if ($argc != 2)
    return ;
make_tab();
if ($argv[1] == "moyenne")
    moyenne();
else if ($argv[1] == "moyenne_user")
    moyenne_user();
else if ($argv[1] == "ecart_moulinette")
    ecart_moulinette();
?>