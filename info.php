<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Afficher un message de bienvenue selon le sexe (méthode GET)
 * Date : 18/10/2026
 */

$nom = htmlspecialchars($_GET['nom'] ?? '');
$prenom = htmlspecialchars($_GET['prenom'] ?? '');
$sexe = $_GET['sexe'] ?? 'M';

$civilite = ($sexe == 'F') ? 'Madame' : 'Monsieur';
echo "Bonjour $civilite $prenom $nom";
?>