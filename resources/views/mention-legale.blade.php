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
@endsection

@section('content')
<section>
            <h2>CONDITIONS - VENTES EN LIGNE</h2>
            <p>Nous vous remercions pour votre commande.</p>
            <p> Veuillez lire attentivement les
                informations suivantes :</p>

            <p>Tous les prix sont TVA comprises. Les cautions (Vaisselle et Wok) vous seront
                remboursées sur présentation du
                ticket de caisse.</p>
            <p>Pour les commandes de Wok, la caution est de 50€ par wok (réglée sur le site).</p>
            <p>Pour toute commande supplémentaire de wok, une caution additionnelle de 50€/wok vous
                sera demandée le jour de
                l’enlèvement.</p>

            <p>Une fois votre commande enregistrée et payée, vous recevrez un MAIL de CONFIRMATION
                (merci de vérifier dans
                votre courrier indésirable)
            </p>
        </section>
        <section>
            <h2>Où retirer sa commande ?</h2>
            <p>8 rue de saint-Leger, 7711, Dottignies</p>

            <p>Prenez le mail imprimé le jour de retrait de la marchandise.</p>
            <p>Livraisons possibles et gratuites pour les commandes de plus de 300€, dans un rayon
                de 10 km</p>
            <p>Pour toute réclamation, merci de vous adresser directement au magasin "Le P'tit
                Vivo" ou au 056/58.84.82</p>
            <p>Comme vous vous en doutiez sûrement, Au P’tit Vivo n’est pas épargné par la crise
                que nous traversons.</p>
            <p>Elle nous contraint malheureusement à augmenter subjectivement nos tarifs de
                quelques centimes .</p>
            <p> Une légère hausse qui nous permet de toujours vous satisfaire en continuant de vous
                proposer des produits frais et de qualités
                Bon appétit</p>
        </section>
        <img src="Images/fondecran.png" alt="logoVivo">

@endsection