<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Variables, constantes, types et chaînes
 * Date :17/10/2026
 */

// Commentaire sur une ligne avec //
# Commentaire sur une ligne avec #
/* Commentaire
   sur plusieurs lignes */

require 'config.php';
echo '<pre>';
echo "Hello PHP\n\n";

// ===== 1.1 Noms de variables =====
// $x       : valide (commence par une lettre)
// $_x      : valide (commence par _)
// $2x      : INVALIDE (commence par un chiffre)
// $x-y     : INVALIDE (le - est un opérateur)
// $Prix_HT : valide (lettres, chiffres et _ autorisés)
// $prix ht : INVALIDE (espace interdit)
// $état    : valide (PHP accepte les caractères accentués)
$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "ok";

$a = 5;
$A = 10;
echo "1.1 : \$a = $a et \$A = $A (variables distinctes)\n\n";

// ===== 1.2 Constantes =====
echo "1.2 : " . ETABLISSEMENT . " | " . NOTE_MIN . " | " . NOTE_MAX . " | " . SEUIL . "\n";
var_dump(defined('SEUIL'));
var_dump(defined('INCONNUE'));
// Q1 : afficher une constante non définie => PHP 8 : Error fatale
//      "Undefined constant" (avant PHP 8 : simple warning, affiche le nom).
// Q2 : const est résolu à la compilation (se met au début du fichier,
//      pas dans un if/boucle) ; define() est exécuté à l'exécution
//      (peut être dans un if) et accepte un nom calculé.
echo "\n";

$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + $prix_ht * $tva / 100;
echo "1.3 : Le prix TTC du produit est de $prix_ttc €.\n\n";

echo "1.4 :\n";
$test = 42;
$test = (string) $test;
var_dump($test);   // string(2) "42"

var_dump((bool) 0, (bool) 0.0, (bool) "0", (bool) "");
var_dump((bool) "abc", (bool) [], (bool) null);

var_dump((int) 3.9, (int) "12abc", (float) "1.5e3", (int) true);

echo "255 : " . 255 . " | " . 0xFF . " | " . 0377 . " | " . 0b11111111 . "\n";
echo "En vrai : " . dechex(255) . " | " . decoct(255) . " | " . decbin(255) . "\n\n";

$traitees = "égales à";
$ici = 2;
echo "1.5 :\n";
echo 'Ahmed a dit : "J\'ai réussi"' . "\n";
echo 'Voulez-vous supprimer C:\*.*?' . "\n";
echo 'Ceci n\'affichera pas \n de nouvelle ligne' . "\n";
echo 'Les variables ne seront pas $traitees $ici' . "\n";
echo "Les variables seront $traitees $ici\n";

$texte = trim("*Bonjour les développeurs*", '*');
echo "$texte\n";

for ($i = 0; $i < mb_strlen($texte); $i++) {
    echo mb_substr($texte, $i, 1) . "\n";
}
echo '</pre>';
?>