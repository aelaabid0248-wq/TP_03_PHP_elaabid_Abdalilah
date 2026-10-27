<?php
/*
 * Auteur : Abdelilah Elaabid
 * Objectif : Formulaire de connexion avec session, redirection et cookie
 * Date : 18/10/2026
 */
session_start();

$erreur = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    if ($login !== '') {
        $_SESSION['login'] = $login;
    setcookie("dernier_login", json_encode(["login" => $login, "date" => date("d/m/Y H:i")]), time() + 86400, "/");        
        header("Location: profil.php");        
        exit;
    }
    $erreur = "Veuillez saisir un login.";
}

$cookie = json_decode($_COOKIE['dernier_login'] ?? '', true);
$dernier_login = $cookie['login'] ?? '';
$derniere_date = $cookie['date'] ?? '';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if ($derniere_date !== '') { echo "<p>Dernière connexion : " . htmlspecialchars($derniere_date) . "</p>"; } ?>
    <?php if ($erreur !== "") { echo "<p style='color:red'>" . htmlspecialchars($erreur) . "</p>"; } ?>
    <form action="login.php" method="post">
        Login : <input type="text" name="login" value="<?php echo htmlspecialchars($dernier_login); ?>"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>