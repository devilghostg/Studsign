<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/connexion.css">
    <title>Studsign : Connexion</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Soumission du formulaire d'inscription
            $('#signupForm').submit(function(event) {
                event.preventDefault(); // Empêcher l'envoi par défaut

                var formData = $(this).serialize(); // Sérialiser les données du formulaire

                $.ajax({
                    type: 'POST',
                    url: '../db/register.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            alert(response.message); // Afficher une alerte de succès
                            $('#signupForm')[0].reset(); // Réinitialiser le formulaire
                        } else {
                            alert(response.message); // Afficher une alerte d'erreur
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors de la requête AJAX:', error);
                    }
                });
            });

            // Soumission du formulaire de connexion
            $('#loginForm').submit(function(event) {
                event.preventDefault(); // Empêcher l'envoi par défaut

                var formData = $(this).serialize(); // Sérialiser les données du formulaire

                $.ajax({
                    type: 'POST',
                    url: '../db/login.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            alert(response.message); // Afficher une alerte de succès
                            window.location.href = '../page/protected_page.php'; // Redirection après connexion réussie
                        } else {
                            alert(response.message); // Afficher une alerte d'erreur
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors de la requête AJAX:', error);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <h2><a href="../index.php">StudSign</a></h2>
        </nav>
    </header>
    <main class="main-container">
        <!-- Boutons Inscription ou Connexion -->
        <div id="btn">
            <div class="btn">
                <button class="tab active" onclick="showForm('signup')">Inscription</button>
                <button class="tab" onclick="showForm('login')">Connexion</button>
            </div>
        </div>
        <div class="form">
            <!-- Informations -->
            <div id="info" class="info-box">
                <h2>NOTRE POLITIQUE ET NOS ENGAGEMENTS</h2>
                <p><strong>100% SÉCURISÉ</strong><br>Protégez vos données avec notre chiffrement de niveau bancaire. Connexion sécurisée garantie.</p>
                <p><strong>RESPECT DE LA CONFIDENTIALITÉ</strong><br>Votre vie privée est sacrée. Nous ne partageons vos informations qu’avec votre accord explicite.</p>
                <p><strong>CONFORMITÉ ET NORMES</strong><br>Nous adhérons aux normes internationales pour une signature électronique fiable et conforme.</p>
            </div>
            <!-- Formulaire -->
            <div id="form" class="form-container">
                <form id="signupForm" method="post">
                    <h2>INSCRIPTION</h2>
                    <label for="fullname">Nom complet</label>
                    <input type="text" id="fullname" name="fullname" required>
                
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required>
                
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                
                    <label for="confirm_password">Confirmez le mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                
                    <button type="submit">S'inscrire</button>
                </form>
                <form id="loginForm" action="../db/login.php" method="post" class="active">
                    <h2>CONNEXION</h2>
                    <label for="username">Email</label>
                    <input type="email" id="username" name="username" required>
                
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Se connecter</button>
                    
                </form>
            </div>
        </div>
    </main>
    <script src="../script/scripts.js"></script>
    <footer>
        <a href="#" target="_blank" >Mention légales</a>
        <a href="#" target="_blank" >Politique de données</a>
        <a href="#" target="_blank" >Copyright 2024</a>
    </footer>
</body>
</html>
