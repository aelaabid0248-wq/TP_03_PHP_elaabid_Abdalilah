<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Tableaux indexés et associatifs, statistiques et tris
 * Date : 17/10/2026
 */

require 'config.php';
require 'includes/entete_inc.php';
require 'includes/menu_inc.php';

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["Programmation Web", "Base de données", "Modélisation UML"];

echo "<h3>3.1 Modules</h3>";
foreach ($modules as $m) {
    echo "$m<br>";
}
for ($i = 0; $i < count($modules); $i++) {
    echo "Module $i : " . $modules[$i] . "<br>";
}

echo "<h3>3.2 Tableau des notes</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style><td>$nom</td><td>$note</td><td>" . mention($note) . "</td></tr>";
}
echo "</table>";

echo "<h3>3.3 Statistiques</h3>";
$somme = 0;
$nb = 0;
$meilleure = NOTE_MIN;
$faible = NOTE_MAX;
foreach ($notes as $note) {
    $somme += $note;
    $nb++;
    if ($note > $meilleure) {
        $meilleure = $note;
    }
    if ($note < $faible) {
        $faible = $note;
    }
}
$moyenne = $somme / $nb;
echo "Boucle : somme = $somme, moyenne = " . round($moyenne, 2)
    . ", meilleure = $meilleure, plus faible = $faible<br>";
echo "Fonctions : somme = " . array_sum($notes) . ", moyenne = "
    . round(array_sum($notes) / count($notes), 2)
    . ", max = " . max($notes) . ", min = " . min($notes) . "<br>";

$effectifs = [
    "Très bien" => 0, "Bien" => 0, "Assez bien" => 0,
    "Passable" => 0, "Ajourné" => 0
];
foreach ($notes as $note) {
    $effectifs[mention($note)]++;
}
echo "<pre>";
print_r($effectifs);
echo "</pre>";

function afficher($tab)
{
    foreach ($tab as $nom => $note) {
        echo "$nom : $note<br>";
    }
}

echo "<h3>3.4 Tri par noms croissants (ksort)</h3>";
$t = $notes;
ksort($t);
afficher($t);

echo "<h3>Tri par notes décroissantes (arsort)</h3>";
$t = $notes;
arsort($t);
afficher($t);

echo "<h3>Tri par noms décroissants (krsort)</h3>";
$t = $notes;
krsort($t);
afficher($t);

echo "<h3>Tri par notes croissantes (asort)</h3>";
$t = $notes;
asort($t);
afficher($t);
// Pour un tableau indexé comme $modules, on utilise sort() (ou rsort()).

echo "<h3>3.5 Opérateurs de tableaux</h3>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo "<pre>";
echo '$a + $b : ';
print_r($a + $b);
echo '$a == $b : ';
var_dump($a == $b);
echo '$a === $b : ';
var_dump($a === $b);
echo "</pre>";
// $a + $b : union des tableaux, résultat ["x" => 1, "y" => 2].
// $a == $b : true, car mêmes paires clé/valeur (l'ordre n'a pas d'importance).
// $a === $b : false, car === exige aussi le même ordre et les mêmes types.
require 'includes/pied_inc.php';
// Expérience 1 :
// include avec un fichier inexistant : simple Warning, le reste du script s'exécute.
// require avec un fichier inexistant : Fatal error, le script s'arrête immédiatement.

// Expérience 2 :
// include deux fois : le menu s'affiche deux fois.
// include_once deux fois : le menu ne s'affiche qu'une seule fois.
?>