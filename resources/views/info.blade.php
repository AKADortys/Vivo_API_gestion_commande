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
<link rel="stylesheet" href={{ asset('css/nouscontacter.css') }}>
@endsection
@section('content')
<h1>Au P'tit Vivo</h1>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2525.6084763924637!2d3.3010954!3d50.7272024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c32524f913e975%3A0xcb66428b4b65e571!2sAu%20ptit%20vivo!5e0!3m2!1sfr!2sbe!4v1709453874825!5m2!1sfr!2sbe"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <section id="main-coord">
            <h2>Où nous contacter</h2>
            <img src="Images/logotel.png" alt="Telephone">
            <img src="Images/logomap.png" alt="Adresse">
            <img src="Images/6386842.png" alt="Mail">
            <p>056/58.84.82</p>
            <p><a href="https://maps.app.goo.gl/oRAindBqFdBJojiH9">Rue de Saint-Léger 8, 7711 Mouscron</a></p>
            <p>noemiiea@icloud.com</p>
        </section>
        <section id="main-hora">
            <h2>Horaires</h2>
            <table>
                <tr>
                    <td>Lundi</td>
                    <td>10H00-14H00 & 16H00-19H00</td>
                </tr>
                <tr>
                    <td>Mardi</td>
                    <td>10H00-14H00 & 16H00-19H00</td>
                </tr>
                <tr>
                    <td>Mercredi</td>
                    <td>10H00-14H00 & 16H00-19H00</td>
                </tr>
                <tr>
                    <td>Jeudi</td>
                    <td>10H00-14H00 & 16H00-19H00</td>
                </tr>
                <tr>
                    <td>Vendredi</td>
                    <td>10H00-14H00 & 16H00-19H00</td>
                </tr>
                <tr>
                    <td>Samedi</td>
                    <td>Fermé</td>
                </tr>
                <tr>
                    <td>Dimanche</td>
                    <td>Fermé</td>
                </tr>
            </table>
        </section>
        <section id="main-form">
            <h2>Vous avez une question/remarque ?</h2>
            <form method="post" action="#">
                <label for="main-nom">Nom </label>
                <input type="text" id="main-nom">
                <label for="main-prenom">Prénom </label>
                <input type="text" id="main-prenom">
                <label for="main-question">Votre question </label>
                <textarea id="main-question">Votre question ici</textarea>
                <input type="submit" value="Envoyer" id="question-submit">
            </form>
        </section>
@endsection