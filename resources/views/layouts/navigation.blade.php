<header class="bg-success text-white p-3 d-flex justify-content-between align-items-center">
    <!-- En-tête de la page avec une couleur de fond et du texte blanc -->
    <!-- Navigation principale -->
    <nav class="d-flex align-items-center">
        <!-- Titre de l'application -->
        <a href="{{ route('categorie.index') }}" class="text-white mx-3 hover:underline">WoodyCraft4Shop</a>
        <!-- Lien vers la page d'accueil -->
        <a href="{{ route('categorie.index') }}" class="text-white mx-3 hover:underline">Accueil</a>
        <!-- Lien vers la page des produits -->
        <a href="{{ route('lesproduits.index') }}" class="text-white mx-3 hover:underline">Les produits</a>
        @auth
            <!-- Lien vers la page des commandes -->
            <a href="{{ route('commande.index') }}" class="text-white mx-3 hover:underline">Mes commandes</a>
        @endauth
    </nav>
    <!-- Section pour les boutons de connexion et d'inscription -->
    <div class="d-flex align-items-center">
        <!-- Lien vers le wishlist avec une icône -->
        <a href="{{ route('wishlist.index') }}" class="text-white mx-3 hover:underline">
            <i class="fas fa-heart"></i>
        </a>
        <!-- Lien vers le panier avec une icône de panier -->
        <a href="{{ route('panier.index') }}" class="text-white mx-3 hover:underline">
            <i class="fas fa-shopping-cart"></i>
        </a>
        @guest
            <!-- Lien vers la page de connexion -->
            <a href="{{ route('login') }}" class="text-white mx-3 hover:underline">Se connecter</a>
            <!-- Lien vers la page d'inscription -->
            <a href="{{ route('register') }}" class="text-white mx-3 hover:underline">S'inscrire</a>
        @endguest
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:underline">Déconnexion</button>
            </form>
        @endauth
    </div>
</header>
