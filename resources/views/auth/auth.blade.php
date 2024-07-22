<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('style/connexion.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('script/scripts.js') }}" defer></script>
    <title>StudentLogin</title>
</head>

<body>
    <header>
        <nav>
            <h2><a href="{{ route('main') }}">StudSign</a></h2>
        </nav>
    </header>

    <main class="main-container">
        <!-- Affichage du message de succès -->
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif
        <!-- Affichage des messages d'erreur -->
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
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
                <p><strong>100% SÉCURISÉ</strong><br>Protégez vos données avec notre chiffrement de niveau bancaire.
                    Connexion sécurisée garantie.</p>
                <p><strong>RESPECT DE LA CONFIDENTIALITÉ</strong><br>Votre vie privée est sacrée. Nous ne partageons vos
                    informations qu’avec votre accord explicite.</p>
                <p><strong>CONFORMITÉ ET NORMES</strong><br>Nous adhérons aux normes internationales pour une signature
                    électronique fiable et conforme.</p>
            </div>
            <!-- Formulaire -->
            <div id="form" class="form-container">
                <form id="signupForm" action="{{ route('register') }}" method="post">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

                    <label for="email"> Confirmez adresse e-mail</label>
                    <input type="email" id="email" name="email_verified_at" value="{{ old('email_verified_at') }}"
                        required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>

                    <button type="submit">S'inscrire</button>
                </form>
                <form id="loginForm" action="{{ route('login') }}" class="active" method="post">
                    @csrf
                    <h2>CONNEXION</h2>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Se connecter</button>
                </form>

            </div>
        </div>
    </main>
    <footer>
        <a href="#" target="_blank">Mention légales</a>
        <a href="#" target="_blank">Politique de données</a>
        <a href="#" target="_blank">Copyright 2024</a>
    </footer>
</body>

</html>