<?php
session_start();
require 'db_connect.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer et exécuter la requête SQL
    $sql = "SELECT id, password FROM users WHERE username = :username OR email = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        
        // Renvoyer une réponse JSON pour indiquer la réussite de la connexion
        echo json_encode(array('status' => 'success', 'message' => 'Connexion réussie.'));
        exit;
    } else {
        // Renvoyer une réponse JSON pour indiquer l'échec de la connexion
        echo json_encode(array('status' => 'error', 'message' => 'Identifiant ou mot de passe incorrect.'));
        exit;
    }
} else {
    // Redirection ou autre gestion des erreurs si le formulaire n'est pas soumis correctement
    echo json_encode(array('status' => 'error', 'message' => 'Méthode de requête non autorisée.'));
    exit;
}
?>
