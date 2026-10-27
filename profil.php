<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Page protégée affichant le profil de l'utilisateur connecté
 * Date : 18/10/2026
 */
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h2>Bienvenue <?php echo htmlspecialchars($_SESSION['login']); ?></h2>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>