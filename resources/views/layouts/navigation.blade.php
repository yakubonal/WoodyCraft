<header class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
    <!-- En-tête de la page avec une couleur de fond et du texte blanc -->
    <nav class="d-flex align-items-center">
        <!-- Navigation principale -->
        <a href="{{ route('categorie.index') }}" class="text-white mx-3 hover:underline">WoodyCraft4Shop</a>
        <!-- Titre de l'application -->
        <a href="{{ route('categorie.index') }}" class="text-white mx-3 hover:underline">Accueil</a>
        <!-- Lien vers la page d'accueil -->
        <a href="{{ route('lesproduits.index') }}" class="text-white mx-3 hover:underline">Les produits</a>
        <!-- Lien vers la page des lesproduits -->
    </nav>
    <div class="d-flex align-items-center">
        <!-- Section pour les boutons de connexion et d'inscription -->
        <a href="{{ route('panier.index') }}" class="text-white mx-3 hover:underline">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <!-- Lien vers le panier avec une icône de panier -->
        <a href="{{ route('login') }}" class="text-white mx-3 hover:underline">Se connecter</a>
        <!-- Lien vers la page de connexion -->
        <a href="{{ route('register') }}" class="text-white mx-3 hover:underline">S'inscrire</a>
        <!-- Lien vers la page d'inscription -->
    </div>
</header>
