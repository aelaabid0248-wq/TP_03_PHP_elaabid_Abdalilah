<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Jours restants avant la fin du semestre (DateTime) et validation de date (checkdate)
 * Date : 18/10/2026
 */

$aujourdhui = new DateTime('today');
$fin_semestre = new DateTime('2027-01-15');
$diff = $aujourdhui->diff($fin_semestre);

if ($diff->invert) {
    $resultat = "La date de fin de semestre est dépassée.";
} else {
    $resultat = "Il reste " . $diff->days . " jours avant la fin du semestre (15/01/2027).";
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jour = (int) ($_POST['jour'] ?? 0);
    $mois = (int) ($_POST['mois'] ?? 0);
    $annee = (int) ($_POST['annee'] ?? 0);

    if (checkdate($mois, $jour, $annee)) {
        $message = sprintf("Date valide : %02d/%02d/%04d", $jour, $mois, $annee);
    } else {
        $message = "Date invalide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dates</title>
</head>
<body>
    <h3>Fin de semestre</h3>
    <p><?php echo $resultat; ?></p>

    <h3>Validation d'une date</h3>
    <form action="dates.php" method="post">
        Jour : <input type="number" name="jour" min="1" max="31"><br><br>
        Mois : <input type="number" name="mois" min="1" max="12"><br><br>
        Année : <input type="number" name="annee"><br><br>
        <input type="submit" value="Valider">
    </form>
    <?php if ($message !== "") { echo "<p>" . htmlspecialchars($message) . "</p>"; } ?>
</body>
</html>