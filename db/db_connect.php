<?php
$servername = "localhost"; // ou l'adresse de votre serveur
$username = "root"; // votre nom d'utilisateur MySQL
$password = ""; // votre mot de passe MySQL
$dbname = "studsign"; // le nom de votre base de données

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Vous pouvez décommenter cette ligne pour des tests
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Arrêter l'exécution si la connexion échoue
}
?>
