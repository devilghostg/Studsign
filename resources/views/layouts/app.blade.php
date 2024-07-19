<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('style/connexion.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>StudentLogin</title>
    <!-- <script>
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
    </script> -->
</head>
<body>
    <header>
        <nav>
            <h2><a href="{{ route('main') }}">StudSign</a></h2>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <a href="#" target="_blank" >Mention légales</a>
        <a href="#" target="_blank" >Politique de données</a>
        <a href="#" target="_blank" >Copyright 2024</a>
    </footer>
</body>
</html>
