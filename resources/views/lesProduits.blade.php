<!DOCTYPE html>
<html lang="fr"> <!-- Déclaration du type de document et langue -->
<head>
    <meta charset="UTF-8"> <!-- Définit le jeu de caractères utilisé -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive design pour s'adapter aux différentes tailles d'écran -->
    <title>WoodyCraft4Shop</title> <!-- Titre de la page -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Lien vers la feuille de style Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Lien vers les icônes Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Lien vers jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> <!-- Lien vers Popper.js, utilisé pour le positionnement des éléments -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Lien vers le fichier JavaScript de Bootstrap -->
</head>
<body>
    <header class="bg-primary text-white p-3 d-flex justify-content-between align-items-center"> <!-- En-tête de la page avec une couleur de fond et du texte blanc -->
        <nav class="d-flex align-items-center"> <!-- Navigation principale -->
            <span class="header-title text-white mx-3">WoodyCraft4Shop</span> <!-- Titre de l'application -->
            <a href="{{ route('accueil') }}" class="text-white mx-3 hover:underline">Accueil</a> <!-- Lien vers la page d'accueil -->
            <a href="{{ route('produits.index') }}" class="text-white mx-3 hover:underline">Les produits</a> <!-- Lien vers la page des produits -->
        </nav>
        <div class="d-flex align-items-center"> <!-- Section pour les boutons de connexion et d'inscription -->
            <a href="{{ route('panier.index') }}" class="text-white mx-3 hover:underline"><i class="fas fa-shopping-cart"></i></a> <!-- Lien vers le panier avec une icône de panier -->
            <a href="{{ route('login') }}" class="text-white mx-3 hover:underline">Se connecter</a> <!-- Lien vers la page de connexion -->
            <a href="{{ route('register') }}" class="text-white mx-3 hover:underline">S'inscrire</a> <!-- Lien vers la page d'inscription -->
        </div>
    </header>


</body>
</html>



