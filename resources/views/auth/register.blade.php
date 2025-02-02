<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>

<body>

    <h2>Inscription</h2>

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

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br>
        <br>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br>
        <br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <br>
        <br>

        <label>Âge :</label>
        <input type="number" name="age" value="{{ old('age') }}" required>
        <br>
        <br>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Connectez-vous ici</a></p>

</body>

</html>
