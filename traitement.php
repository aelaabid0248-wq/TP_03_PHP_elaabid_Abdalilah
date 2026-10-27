<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Valider les données du formulaire (POST) et les enregistrer dans un CSV
 * Date : 18/10/2026
 */

require 'config.php';

$erreurs = [];

if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) || empty(trim($_POST['nom']))) {
    $erreurs[] = "Tous les champs sont obligatoires.";
} elseif (!is_numeric($_POST['note_info']) || !is_numeric($_POST['note_math'])) {
    $erreurs[] = "Les notes doivent être numériques.";
} else {
    $note_info = (float) $_POST['note_info'];
    $note_math = (float) $_POST['note_math'];
    if ($note_info < NOTE_MIN || $note_info > NOTE_MAX || $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
        $erreurs[] = "Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".";
    }
}

if (empty($erreurs)) {
    $nom_brut = trim($_POST['nom']);
    $nom = htmlspecialchars($nom_brut);
    $moyenne = ($note_info + $note_math) / 2;

    $fichier = fopen('data/notes.csv', 'a');
    fputcsv($fichier, [$nom_brut, $note_info, $note_math], ';', '"', '\\');
    fclose($fichier);

    echo "<h3>Récapitulatif</h3>";
    echo "Nom : $nom<br>";
    echo "Note Info : $note_info<br>";
    echo "Note Math : $note_math<br>";
    echo "Moyenne : " . round($moyenne, 2) . " (" . mention($moyenne) . ")<br>";
} else {
    foreach ($erreurs as $e) {
        echo "<p style='color:red'>" . htmlspecialchars($e) . "</p>";
    }
}
echo "<a href='saisie.html'>Retour</a>";

// Q1 : POST n'affiche pas les données dans l'URL (contrairement à GET, qui les laisse
// visibles dans la barre d'adresse, l'historique et les logs du serveur), donc il est
// préférable pour un mot de passe.
// Q2 : $_REQUEST contient le contenu de $_GET, $_POST et $_COOKIE.
// Q3 : avec le mode "w" au lieu de "a", le fichier serait vidé à chaque ouverture :
// seul le dernier apprenant saisi serait conservé.
?>