<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Protégée</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h1>
    <p>Ceci est une page protégée accessible uniquement aux utilisateurs connectés.</p>
    <a href="../db/logout.php">Se déconnecter</a>
</body>
</html>
