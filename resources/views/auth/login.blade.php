<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>

<body>

    <h2>Connexion</h2>

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

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br>
        <br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <br>
        <br>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>

</body>

</html>
