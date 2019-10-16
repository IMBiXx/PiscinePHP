#!/usr/bin/php
<?php
if ($argc != 2)
    return ;
$date = $argv[1];
$date = explode(" ", $date);
$tab_days = array("Lundi", "Mardi", "Mercedi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$tab_months = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
$i = 1;
foreach ($tab_months as $elem) {
    if (strcasecmp($elem, $date[2]) == 0)
        $month = $i;
    $i++;
}
$i = 1;
foreach ($tab_days as $elem) {
    if (strcasecmp($elem, $date[0]) == 0)
        $day = $i;
    $i++;
}

$result = $date[1]." ".$month." ".$date[3]." ".$date[4];
if (!$month || !$day || preg_match("/^([0-2][0-9]|(3)[0-1])( )(((0)[0-9])|((1)[0-2]))( )\d{4}( )([0-1][0-9]|(2)[0-3])(:)([0-5][0-9])(:)([0-5][0-9])$/", $result)."\n".$result."\n" == 0){
    echo "Wrong Format\n";
    return ;
}
if ($date2 = DateTime::createFromFormat('d m Y H:i:s', $result)){
    $date2 = $date2->format('U');
    echo "$date2\n";}
else
    echo "Wrong Format\n"
?>