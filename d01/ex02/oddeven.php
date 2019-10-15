#!/usr/bin/php
<?php
while (True)
{
	echo "Entrez un nombre: ";
	$val = trim(fgets(STDIN));
	if(feof(STDIN))
		break;
	if (is_numeric($val))
	{
		echo "Le chiffre $val est ";
		if ($val % 2 == 0)
			echo "Pair\n";
		else
			echo "Impair\n";
	}
	else
		echo "'$val' n'est pas un nombre.\n";
}
?>
