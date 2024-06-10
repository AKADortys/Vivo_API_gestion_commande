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
    <link rel="stylesheet" href={{ asset('css/profile.css') }}>
@endsection

<aside>
        <h2>Votre compte</h2>
        <ul>
            <li>Mon panier</li>
            <li>Paramètres utilisateur</li>
            <li>Mon historique de commande</li>
            <li>Cartes fidélité</li>
        </ul>
        <img src="Images/fondecran.png" alt="Logo Vivo">
    </aside>
@section('content')
    <!-- Ici le contenue de la page -->
        <h1>Au P'tit Vivo</h1>
        <div id="profile-interf-cadre">
            <section id="section-panier" class="hidden-section">
                <!-- Contenu de la section "Mon panier" -->
                <h2>Dans votre panier</h2>
                <table>
                    <tr>
                        <td>produits 1</td>
                        <td>prix/total</td>
                        <td>quantité</td>
                        <td>dispo</td>
                    </tr>
                    <tr>
                        <td>produits 9</td>
                        <td>prix/total</td>
                        <td>quantité</td>
                        <td>dispo</td>
                    </tr>
                    <tr>
                        <td>produits 4</td>
                        <td>prix/total</td>
                        <td>quantité</td>
                        <td>dispo</td>
                    </tr>
                    <tr>
                        <td>produits 3</td>
                        <td>prix/total</td>
                        <td>quantité</td>
                        <td>dispo</td>
                    </tr>
                </table>
                <p>TOTAL:</p>
                <button>Valider ma commande</button> <button>Modifier</button> <button>Supprimer</button>
            </section>

            <section id="section-parametres" class="hidden-section">
                <!-- Contenu de la section "Paramètres utilisateur" -->
                <h2>Vos informations utilisateur</h2>
            </section>

            <section id="section-historique" class="hidden-section">
                <!-- Contenu de la section "Mon historique de commande" -->
                <h2>Votre historique de commande</h2>
            </section>

            <section id="section-cartes" class="hidden-section">
                <!-- Contenu de la section "Cartes fidélité" -->
                <h2>A propos des point.</h2>
            </section>
        </div>
        <section id="day-menu">
            <h2>Plats du jour</h2>
            <a href="commander.html#menu-command">
                <table>
                    <tr>
                        <td colspan="2">Designation plat n°--</td>
                    </tr>
                    <tr>
                        <td><img src="Images/food1.jpg" alt="image du plat"></td>
                        <td>00.00 EUR</td>
                    </tr>
                </table>
            </a>
        </section>
        <div id="profile-pts-count">
            <h2>Vos points</h2>
            <span id="fidel-pts">5</span>
        </div>
        <div id="profile-promo">
            Bandeau promo
        </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuItems = document.querySelectorAll('aside li');
        const sections = document.querySelectorAll('.hidden-section');

        menuItems.forEach((item, index) => {
            item.addEventListener('click', function () {
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