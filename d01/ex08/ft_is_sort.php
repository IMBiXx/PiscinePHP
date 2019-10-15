#!/usr/bin/php
<?php
function ft_is_sort($tab) {
    $correct = $tab;
    sort($correct, SORT_STRING);
    $i = 0;
    foreach ($tab as $elem) {
        if ($correct[$i] != $elem)
            return FALSE;
        $i++;
    }
    return TRUE;
}
?>