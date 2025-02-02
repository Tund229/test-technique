<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>

<body>

    <h2>Bienvenue sur votre espace utilisateur</h2>
    <p>Vous êtes connecté en tant que {{ auth()->user()->name }}.</p>

    <!-- Formulaire pour créer une boutique -->
    <h3>Créer une boutique</h3>
    <form action="{{ route('store.create') }}" method="POST">
        @csrf
        <label>Nom de la boutique :</label>
        <input type="text" name="name" required>
        <button type="submit">Créer</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Bouton de déconnexion -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>

</body>

</html>
