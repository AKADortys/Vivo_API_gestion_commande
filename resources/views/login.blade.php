<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titre de la page -->
    <title>Au P'tit Vivo - Accueil</title>

    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link href='https://fonts.googleapis.com/css2?family=Love+Light&display=swap' rel='stylesheet' type='text/css'>

    <!-- Liens vers les fichiers CSS -->
    <link rel="stylesheet" href={{ asset('css/Primary-values.css') }}>
    <link rel="stylesheet" href={{ asset('css/Head_Main_Foot.css') }}>
    <link rel="stylesheet" href={{ asset('css/Sign_In.css') }}>
@endsection

@section('content')
<h1>Connexion</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" required autofocus>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Se connecter</button>
    </div>
</form>
@endsection
