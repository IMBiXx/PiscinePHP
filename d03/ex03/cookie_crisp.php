<?php

foreach ($_GET as $key=>$elem)
    $i = $key;

setcookie($i, $_GET[$i],time());
?>