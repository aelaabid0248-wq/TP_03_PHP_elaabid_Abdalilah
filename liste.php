<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Lire et afficher le fichier CSV des notes
 * Date : 18/10/2026
 */

require 'config.php';

$chemin = 'data/notes.csv';

if (!file_exists($chemin)) {
    echo "Le fichier $chemin n'existe pas.";
    exit;
}

$f = fopen($chemin, 'r');
if (!$f) {
    echo "Impossible d'ouvrir le fichier.";
    exit;
}

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

$total = 0;
$nb = 0;
while (($ligne = fgetcsv($f, 0, ';', '"', '\\')) !== false) {
    if (count($ligne) < 3) {
        continue;
    }
    [$nom, $info, $math] = $ligne;
    $moy = ($info + $math) / 2;
    $total += $moy;
    $nb++;
    echo "<tr><td>" . htmlspecialchars($nom) . "</td><td>$info</td><td>$math</td><td>"
        . round($moy, 2) . "</td><td>" . mention($moy) . "</td></tr>";
}
fclose($f);
echo "</table>";

if ($nb > 0) {
    echo "<p>Moyenne générale de la classe : " . round($total / $nb, 2) . "</p>";
}
echo "<h3>Lecture avec fgets, feof et explode</h3>";
$f = fopen($chemin, 'r');
while (!feof($f)) {
    $ligne = fgets($f);
    if ($ligne === false || trim($ligne) === '') {
        continue;
    }
    $champs = explode(';', trim($ligne));
    echo implode(" | ", $champs) . "<br>";
}
fclose($f);
?>