<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Structures de contrôle et boucles
 * Date : 17/10/2026
 */

require 'config.php';

// 2.1 if / elseif / else
echo "<h3>2.1 Mentions</h3>";
foreach ([18, 15, 12, 10, 7] as $n) {
    echo "$n : " . mention($n) . "<br>";
}

// 2.2 switch
echo "<h3>2.2 Mois courant</h3>";
$mois = (int) date("m");

switch ($mois) {
    case 1:  echo "Janvier";   break;
    case 2:  echo "Février";   break;
    case 3:  echo "Mars";      break;
    case 4:  echo "Avril";     break;
    case 5:  echo "Mai";       break;
    case 6:  echo "Juin";      break;
    case 7:  echo "Juillet";   break;
    case 8:  echo "Août";      break;
    case 9:  echo "Septembre"; break;
    case 10: echo "Octobre";   break;
    case 11: echo "Novembre";  break;
    case 12: echo "Décembre";  break;
    default: echo "Mois inconnu";
}
// Q3 : si on oublie un break, PHP continue d'exécuter les case suivants
// (fall through) jusqu'au prochain break ou la fin du switch.

// 2.3 Boucles
echo "<h3>2.3.1 Triangle</h3><pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "</pre>";

echo "<h3>2.3.2 while (0 à 20, pas de 2)</h3>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<b>$i</b> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}

echo "<h3>2.3.3 for + continue (pairs de 0 à 10)</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i ";
}

echo "<h3>2.3.4 while + switch + break 2</h3>";
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;
        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }
    $i++;
}

echo "<h3>2.3.5 do-while</h3>";
$i = 0;
do {
    if ($i == 10) {
        echo "<b>$i</b> ";
    } else {
        echo "$i ";
    }
    $i += 2;
} while ($i <= 20);
// Différence : do-while exécute le bloc au moins une fois (la condition
// est testée après), alors que while teste la condition avant.
?>