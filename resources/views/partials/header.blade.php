<header>
    <!-- Menu de navigation -->
    <nav>
        <ul>
            <!-- Logo du service traiteur -->
            <li><img src="{{ asset('Images/fondecran.png') }}" id="logoVivo" alt="Logo Au P'tit Vivo"></li>
            <!-- Définission des liens en séparant les menus des sous-menus -->
            @if(auth()->check())
            <li class="menu"><a href="{{ url('/dashboard') }}">{{ auth()->user()->email }}</a></li>
            <li class="menu">
                <form method="POST" id="form-logout" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            </li>
            @else
            <li class="menu"><a href="{{ url('/register') }}">Se connecter</a></li>
            @endif
            <li class="menu"><a href="#">Commander</a>
                <ul class="sousmenu">
                    @auth
                        @foreach($categories as $category)
                            <li><a href="{{ route('orders.category.articles', ['userid' => auth()->id(), 'categoryid' => $category->id]) }}">{{ $category->title }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ url('/login') }}">Connectez-vous pour commander</a></li>
                    @endauth
                </ul>
            </li>
            <li class="menu"><a href="#">Information</a>
                <ul class="sousmenu">
                    <li><a href="{{ url('/contact') }}">Nous contacter</a></li>
                    <li><a href="{{ url('/mention-legale') }}">Mentions légales</a></li>
                </ul>
            </li>
            <li class="menu"><a href="{{ url('/') }}">Accueil</a></li>
        </ul>
    </nav>
</header>
