<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    @yield('links')
    <title>@yield('title', 'StudSign')</title>
    @vite('resources/css/app.css')
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

<body class="flex flex-col h-screen w-screen">

    <header class="bg-[#225A76] text-white">
        <nav class="flex justify-between items-center p-4">
            <a href="{{ route('main') }}" class="text-2xl font-semibold">StudSign</a>
            @auth
                <div class="flex items-center">
                    <a href="{{ route('profile') }}" class="ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="ml-3">
                        @csrf
                        <button type="submit" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="grid grid-cols-3 divide-x bg-[#225A76] text-white w-full p-4 text-center">
        <a href="#" target="_blank" class="mx-2">Mention légales</a>
        <a href="#" target="_blank" class="mx-2">Politique de données</a>
        <a href="#" target="_blank" class="mx-2">Copyright 2024</a>
    </footer>

</body>

</html>