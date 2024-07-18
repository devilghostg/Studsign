<?php
// Inclure le fichier de connexion à la base de données
require 'db_connect.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Initialiser le tableau de réponse JSON
    $response = array();

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $response['status'] = 'error';
        $response['message'] = "Les mots de passe ne correspondent pas.";
        echo json_encode($response);
        exit;
    }

    // Vérifier si l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = "L'adresse email n'est pas valide.";
        echo json_encode($response);
        exit;
    }

    // Vérifier si l'email est déjà enregistré
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->fetch()) {
        $response['status'] = 'error';
        $response['message'] = "Cette adresse email est déjà enregistrée.";
        echo json_encode($response);
        exit;
    }

    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Préparer et exécuter la requête SQL pour insérer les données
    $sql = "INSERT INTO users (fullname, email, username, password) VALUES (:fullname, :email, :username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Inscription réussie. Connectez-vous maintenant.';
        echo json_encode($response);
        exit;
    } else {
        $response['status'] = 'error';
        $response['message'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        echo json_encode($response);
        exit;
    }
}
?>
