<!-- resources/views/home.blade.php -->
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
<link rel="stylesheet" href={{ asset('css/index.css') }}>
@endsection

@section('content')
<!-- premier div qui va contenir l'interface de navigation du menu d'accueil, il contient les liens suivants :
             connection/inscription, contact, commander, informations, accueil et un cadre annonce  -->
<h1>Au P'tit Vivo, service traiteur</h1>
<div class="interface-navigation">
    @if(auth()->check())
    <div class="bloc"><a href="{{ url('/dashboard') }}">Mon compte</a></div>
    @else
    <div class="bloc"><a href="{{ url('/register') }}">Se connecter</a></div>
    @endif
    <div class="bloc"><img src="Images/food1.jpg" alt="produit traiteur"></div>
    <div class="bloc"><a href="{{ url('/contact') }}">Nous contacter</a></div>
    <div class="bloc"><img src="Images/food4.jpg" alt="produit traiteur"></div>
    <div id="annonce">Cadre d'annonce</div>
    <div class="bloc"><img src="Images/food.jpg" alt="produit traiteur"></div>
    <div class="bloc">
        @if(auth()->check())
        <a href="{{ route('orders.category.articles', ['userid' => auth()->id(), 'categoryid' => 1]) }}">Le menu du jour</a>
        @else
        <a href="{{ url('/register') }}">Le menu du jour</a>
        @endif
    </div>
    <div class="bloc"><img src="Images/fondecran2.jpg" alt="produit traiteur"></div>
    <div class="bloc"><a href="{{ url('/mention-legale') }}">Mentions légales</a></div>
</div>
<!-- Cette section contiendras les historique de l'entreprise, les message éventuels et images du personnel/magason etc -->
<section class="main-section">
    <h2>Présentation du chef !</h2>
    <img src="Images/photosimon.png" alt="Photo du chef">
    <p>Après de nombreuses années au service du Vivo.le jeune Simon a decidé de continuer le services traiteur
        au sein de l'entité de Dottignies.</p>
    <p>Il met toute son expérience et son professionnalisme au service des clients par la préparation
        des repas à emporter,en gardant le savoir-faire et la qualité des produits Vivo.</p>
    <p>C'est en hommage à ses anciens employeurs que Simon a appelé son service traiteur le P'tit Vivo.</p>
</section>
</main>
@endsection