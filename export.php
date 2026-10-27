<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Exporter les résultats en JSON et comparer avec serialize
 * Date : 18/10/2026
 */

require 'config.php';

$chemin = 'data/notes.csv';
if (!file_exists($chemin)) {
    echo "Le fichier $chemin n'existe pas.";
    exit;
}

$resultats = [];
$f = fopen($chemin, 'r');
while (($ligne = fgetcsv($f, 0, ';', '"', '\\')) !== false) {
    if (count($ligne) < 3) {
        continue;
    }
    [$nom, $info, $math] = $ligne;
    $resultats[] = [
        'nom' => $nom,
        'note_info' => (float) $info,
        'note_math' => (float) $math,
        'moyenne' => ($info + $math) / 2
    ];
}
fclose($f);

file_put_contents('data/notes.json', json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$json = file_get_contents('data/notes.json');
$donnees = json_decode($json, true);

echo "<h3>json_decode + print_r</h3><pre>";
print_r($donnees);
echo "</pre>";

echo "<h3>serialize</h3><pre>" . htmlspecialchars(serialize($resultats)) . "</pre>";
echo "<h3>json_encode</h3><pre>" . htmlspecialchars(json_encode($resultats, JSON_UNESCAPED_UNICODE)) . "</pre>";

?>