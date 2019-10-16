#!/usr/bin/php
<?php
if ($argc != 2)
    return ;
$date = $argv[1];
$date = explode(" ", $date);
$tab_months = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
$i = 1;
foreach ($tab_months as $elem) {
    if (strcasecmp($elem, $date[2]) == 0)
        $month = $i;
    $i++;
}
$result = $date[1]." ".$month." ".$date[3]." ".$date[4];
if ($date2 = DateTime::createFromFormat('d m Y h:i:s', $result)){
    $date2 = $date2->format('U');
    echo "$date2\n";}
else
    echo "Wrong Format\n"
?>