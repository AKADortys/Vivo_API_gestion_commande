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
<link rel="stylesheet" href={{ asset('css/commander.css') }}>
@endsection

@section('content')
<h1>Au P'tit Vivo</h1>
<div id="Command-form">
    <h2>{{$nameCategory}}</h2>
    @foreach($articles as $article)
    <form action="{{ route('orders.addArticle') }}" method="post" id="menu-command">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <section class="menu-presentation">
            <h3>{{ $article->label }}</h3>
            <p>{{ $article->content }} </p>
            <p>{{ $article->price }} Euro</p>
            <input type="hidden" name="article_ids[]" value="{{ $article->id }}">
            <input type="number" name="quantities[]" min="1" max="10">
            <button type="submit">Ajouter</button>
        </section>
    </form>
    @endforeach
</div>

<div id="form-submit" class="form-submit">
    <section>
        <h3>Avant de valider :</h3>
        <p>Lorsque que vous cliquez sur "Commander", nous enregistrons votre commande et le traiteur vous confirmera la disponibilités des produits contenue dans cette dernière</p>
        <p>Le retraits de votre commande se fait à 10H00-14H00 et 16H00-19H00. A l'adresse suivante: <a href="https://www.google.com/maps/place/Au+ptit+vivo/@50.7272024,3.3010954,17.23z/data=!4m6!3m5!1s0x47c32524f913e975:0xcb66428b4b65e571!8m2!3d50.7271648!4d3.303431!16s%2Fg%2F11qsm8tp2f?entry=tts">Rue de Saint-Léger 8, 7711 Mouscron</a></p>
        <p>Tout les paiements se feront en magasins.</p>
        <p>Une fois votre commande reçue, vous recevrez un mail contenant les détails de votre commande. Notez que cela est uniquement dans le cas où votre commande est confirmer par le traiteur</p>
        <p>Comme vous vous en doutiez sûrement, Au P’tit Vivo n’est pas épargné par la crise que nous traversons.</p>
        <p>Elle nous contraint malheureusement à augmenter subjectivement nos tarifs de quelques centimes.</p>
        <p>Une légère hausse qui nous permet de toujours vous satisfaire en continuant de vous proposer des produits frais et de qualités. Bon appétit</p>
        
    </section>
    <section>
        <h3>Résumé de votre commande</h3>
        <table>
            <tr>
                <th>Produits</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            @foreach($orderArticles as $orderArticle)
            <tr>
                <td>{{ $orderArticle->pivot->label }}</td>
                <td>{{ $orderArticle->pivot->price }} EUR</td>
                <td>{{ $orderArticle->pivot->quantity }}</td>
                <td>{{ $orderArticle->pivot->price * $orderArticle->pivot->quantity }} EUR</td>
                <td>
                    <form action="{{ route('orders.removeArticle') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="article_id" value="{{ $orderArticle->id }}">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <p>Total de votre commande : {{ $order->total_price }} EUR</p>
    </section>
</div>
<form action="{{ route('orders.confirm') }}" method="post">
    @csrf
    <input type="hidden" value="{{$order->id}}" name="order_id">
    <input type="submit" value="Commander" id="submit-button">
</form>
@if(session('error'))
<p>{{ session('error') }}</p>
@endif
@endsection