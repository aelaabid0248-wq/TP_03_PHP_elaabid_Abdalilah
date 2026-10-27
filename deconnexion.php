<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Déconnexion : destruction de la session et redirection
 * Date : 18/10/2026
 */
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;