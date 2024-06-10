<!-- resources/views/register.blade.php -->
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
<h1>Au P'tit Vivo</h1>

<form method="POST" action="{{ route('login') }}" class="Sign_In-form">
    <h2>Vous avez déjà un compte client ?</h2>
    @csrf
    <table>
        <tr>
            <td>
                <label for="email">Adresse e-mail :</label>
            </td>
            <td>
                <input type="email" id="email" name="email"  class="Sign_In-form-input"required autofocus>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Mot de passe :</label>
            </td>
            <td>
                <input type="password" id="password" name="password" class="Sign_In-form-input" required>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="Sign_In-form-button">Se connecter</button>
            </td>
        </tr>
    </table>
</form>

<form method="POST" action="{{ url('/register') }}" class="Sign_In-form">
    @csrf
    <h2>Vous n'avez pas encore de compte client ?</h2>
    <table>
        <tr>
            <td><label for="name">Nom :</label></td>
            <td><input type="text" id="name" name="name" placeholder="Votre nom" class="Sign_In-form-input" required></td>
        </tr>
        <tr>
            <td><label for="password">Votre mot de passe :</label></td>
            <td><input type="password" id="password" name="password" placeholder="8 caractères minimum" class="Sign_In-form-input" required></td>
        </tr>
        <tr>
            <td><label for="password_confirmation">Confirmer votre mot de passe :</label></td>
            <td><input type="password" id="password_confirmation" name="password_confirmation" placeholder="8 caractères minimum" class="Sign_In-form-input" required></td>
        </tr>
        <tr>
            <td><label for="phone">N° de téléphone :</label></td>
            <td><input type="text" id="phone" name="phone" placeholder="ex:0411223344" class="Sign_In-form-input" required></td>
        </tr>
        <tr>
            <td><label for="email">Votre adresse mail</label></td>
            <td><input type="email" id="email" name="email" placeholder="ex:MonMail@gmail.com" class="Sign_In-form-input" required></td>
        </tr>
        <tr>
            <td><label for="newsletter">Inscription à la Newsletter</label></td>
            <td><input type="checkbox" id="newsletter" name="newsletter"></td>
        </tr>
        <tr>
            <td><input type="submit" value="S'inscrire" class="Sign_In-form-button"></td>
            <td><input type="reset" class="Sign_In-form-button"></td>
        </tr>
    </table>
</form>
<section id="about">
    <h3>A propos de la Newsletter :</h3>
    <ul>
        <li>Vous tiendra au courant des menus du jour par mail.</li>
        <li>Vous fera savoir si nous organisons des évènements particuliers.</li>
        <li>Vous aurez l'occasion de supprimer cette inscription à tout moment via votre profil.</li>
    </ul>
    <img src="Images/fondecran.png" alt="Logo Au P'tit Vivo">
</section>
@endsection
