@extends('layouts.app')

@section('head')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Titre de la page -->
<title>Au P'tit Vivo - Accueil</title>

<link rel='preconnect' href='https://fonts.googleapis.com'>
<link href='https://fonts.googleapis.com/css2?family=Love+Light&display=swap' rel='stylesheet' type='text/css'>

<!-- Liens vers les fichiers CSS -->
<link rel="stylesheet" href="{{ asset('css/Primary-values.css') }}">
<link rel="stylesheet" href="{{ asset('css/Head_Main_Foot.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/Sign_In.css') }}">
@endsection

@section('aside')
<h2>Votre compte</h2>
<ul>
    <li>Mon panier</li>
    <li>Paramètres utilisateur</li>
    <li>Mon historique de commande</li>
    <li>Cartes fidélité</li>
</ul>
<img src="Images/fondecran.png" alt="Logo Vivo">
@endsection

@section('content')
<!-- Ici le contenu de la page -->
<h1>Au P'tit Vivo</h1>
<div id="profile-interf-cadre">
    <section id="section-panier" class="hidden-section">
        <!-- Contenu de la section "Mon panier" -->
        <h2>Dans votre panier</h2>
        @foreach ($orders as $order)
            @if (!$order->is_confirmed)
                <div>
                    <h3>Commande de {{ $order->created_at->format('d/m/Y  H:i:s') }}</h3>
                    <p>Nombres d'articles: {{ $order->total_quantity }}</p>
                    <h4>Détails des articles :</h4>
                    <table>
                        <tr>
                            <th>Label</th>
                            <th>Prix unit.</th>
                            <th>Quantité</th>
                            <th>Ajouté le</th>
                            <th>Mise à jour le</th>
                        </tr>
                        @foreach ($order->articles as $article)
                            <tr>
                                <td><strong>{{ $article->pivot->label }}</strong></td>
                                <td>{{ $article->pivot->price }}</td>
                                <td>{{ $article->pivot->quantity }}</td>
                                <td>{{ $article->pivot->created_at->format('d/m/Y  H:i:s') }}</td>
                                <td>{{ $article->pivot->updated_at->format('d/m/Y  H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <p>Total Prix: {{ $order->total_price }} EU</p>
                </div>
            @endif
        @endforeach

        <button>Valider ma commande</button>
        <button>Modifier</button>
        <button>Supprimer</button>
    </section>

    <section id="section-parametres" class="hidden-section">
        <!-- Contenu de la section "Paramètres utilisateur" -->
        <h2>Vos informations utilisateur</h2>
        <form action="{{ route('update-user') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label for="name">Nom :</label></td>
                    <td><input type="text" id="name" name="name" placeholder="Votre nom" class="Sign_In-form-input" required value="{{ auth()->user()->name }}"></td>
                </tr>
                <tr>
                    <td><label for="email">Adresse mail :</label></td>
                    <td><input type="email" id="email" name="email" placeholder="exemple@gmail.com" class="Sign_In-form-input" required value="{{ auth()->user()->email }}"></td>
                </tr>
                <tr>
                    <td><label for="phone">Téléphone :</label></td>
                    <td><input type="tel" id="phone" name="phone" placeholder="Numéro belge seulement" class="Sign_In-form-input" required value="{{ auth()->user()->phone }}"></td>
                </tr>
                <tr>
                    <td><label for="password">Mot de passe :</label></td>
                    <td><input type="password" name="password" id="password" placeholder="8 caract. min" class="Sign_In-form-input"></td>
                </tr>
                <tr>
                    <td><label for="Cpassword">Confirmer le mot de passe :</label></td>
                    <td><input type="password" name="Cpassword" id="Cpassword" class="Sign_In-form-input" placeholder="8 caract. min"></td>
                </tr>
                <tr>
                    <td><label for="newsletter">Activation de la newsletter</label></td>
                    <td><input type="checkbox" name="newsletter" id="newsletter" @if(isset($news) && $news->active) checked @endif></td>
                <tr>
                    <td><button type="submit">Modifier mes informations</button></td>
                    <td><input type="reset" value="Annuler"></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        </form>
    </section>

    <section id="section-historique" class="hidden-section">
        <!-- Contenu de la section "Mon historique de commande" -->
        <h2>Votre historique de commande</h2>
        @foreach ($orders as $order)
            @if ($order->is_confirmed)
                <div>
                    <h3>Commande de {{ $order->created_at->format('d/m/Y  H:i:s') }}</h3>
                    <p>Nombres d'articles: {{ $order->total_quantity }}</p>
                    <p>Confirmé: {{ $order->updated_at->format('d/m/Y  H:i:s') }}</p>
                    <h4>Détails des articles :</h4>
                    <table>
                        <tr>
                            <th>Label</th>
                            <th>Prix unit.</th>
                            <th>Quantité</th>
                            <th>Ajouté le</th>
                            <th>Mise à jour le</th>
                        </tr>
                        @foreach ($order->articles as $article)
                            <tr>
                                <td><strong>{{ $article->pivot->label }}</strong></td>
                                <td>{{ $article->pivot->price }}</td>
                                <td>{{ $article->pivot->quantity }}</td>
                                <td>{{ $article->pivot->created_at->format('d/m/Y  H:i:s') }}</td>
                                <td>{{ $article->pivot->updated_at->format('d/m/Y  H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <p>Total Prix: {{ $order->total_price }} EU</p>
                </div>
            @endif
        @endforeach
    </section>

    <section id="section-cartes" class="hidden-section">
        <!-- Contenu de la section "Cartes fidélité" -->
        <h2>À propos des points</h2>
    </section>
</div>

<section id="day-menu">
    <h2>Plats du jour</h2>
    <a href="{{ route('orders.category.articles', ['userid' => auth()->id(), 'categoryid' => 1]) }}">
        @foreach($menu as $item)
            <table>
                <tr>
                    <td colspan="2"><span>{{ $item->label }}</span></td>
                </tr>
                <tr>
                    <td colspan="2">{{ $item->content }}</td>
                </tr>
                <tr>
                    <td>{{ $item->price }}e</td>
                    <td>{{ $item->available ? 'Disponible' : 'Indisponible' }}</td>
                </tr>
            </table>
        @endforeach
    </a>
</section>

<div id="profile-promo">
    Bandeau promo
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('aside li');
        const sections = document.querySelectorAll('.hidden-section');

        menuItems.forEach((item, index) => {
            item.addEventListener('click', function() {
                // Cacher toutes les sections
                sections.forEach(section => {
                    section.style.display = 'none';
                });

                // Afficher la section correspondante
                sections[index].style.display = 'block';
            });
        });
    });
</script>
@endsection
