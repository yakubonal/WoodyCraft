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

    <div class="container mt-4"> <!-- Conteneur principal avec une marge en haut -->
        <div class="jumbotron text-center"> <!-- Jumbotron pour mettre en avant le titre et la description -->
            <h2>WoodyCraft4Shop</h2> <!-- Titre principal -->
            <p>This site is built with a flex layout, aligned and padded for the content will be centered horizontally and vertically.</p> <!-- Description du site -->
        </div>

        <div class="mb-4"> <!-- Section pour les catégories -->
            <h3>Les catégories</h3> <!-- Titre pour la section des catégories -->
            <div class="btn-group flex-wrap" role="group" aria-label="Catégories"> <!-- Groupe de boutons pour les catégories -->
                <button type="button" class="btn btn-outline-secondary">Animaux</button> <!-- Bouton pour la catégorie "Animaux" -->
                <button type="button" class="btn btn-outline-secondary">Architecture</button> <!-- Bouton pour la catégorie "Architecture" -->
                <button type="button" class="btn btn-outline-secondary">Fantastiques</button> <!-- Bouton pour la catégorie "Fantastiques" -->
                <button type="button" class="btn btn-outline-secondary">Engins Spéciaux</button> <!-- Bouton pour la catégorie "Engins Spéciaux" -->
                <button type="button" class="btn btn-outline-secondary">Musique</button> <!-- Bouton pour la catégorie "Musique" -->
                <button type="button" class="btn btn-outline-secondary">Paysages</button> <!-- Bouton pour la catégorie "Paysages" -->
                <button type="button" class="btn btn-outline-secondary">Objets</button> <!-- Bouton pour la catégorie "Objets" -->
                <button type="button" class="btn btn-outline-secondary">Sports</button> <!-- Bouton pour la catégorie "Sports" -->
                <button type="button" class="btn btn-outline-secondary">Monuments</button> <!-- Bouton pour la catégorie "Monuments" -->
                <button type="button" class="btn btn-outline-secondary">Véhicules</button> <!-- Bouton pour la catégorie "Véhicules" -->
            </div>
        </div>

        <h3>Les produits populaires</h3> <!-- Titre pour la section des produits populaires -->
        <div class="row"> <!-- Ligne pour aligner les produits en colonnes -->
            <div class="col-md-4"> <!-- Colonne pour le premier produit -->
                <div class="card mb-4"> <!-- Carte pour le produit avec une marge en bas -->
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 1"> <!-- Image du produit -->
                    <div class="card-body text-center"> <!-- Corps de la carte avec alignement centré -->
                        <h5 class="card-title">Puzzle 1</h5> <!-- Titre du produit -->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> <!-- Description du produit -->
                        <button class="btn btn-success">Acheter</button> <!-- Bouton d'achat -->
                    </div>
                </div>
            </div>
            <div class="col-md-4"> <!-- Colonne pour le deuxième produit -->
                <div class="card mb-4"> <!-- Carte pour le produit -->
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 2"> <!-- Image du produit -->
                    <div class="card-body text-center"> <!-- Corps de la carte -->
                        <h5 class="card-title">Puzzle 2</h5> <!-- Titre du produit -->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> <!-- Description du produit -->
                        <button class="btn btn-success">Acheter</button> <!-- Bouton d'achat -->
                    </div>
                </div>
            </div>
            <div class="col-md-4"> <!-- Colonne pour le troisième produit -->
                <div class="card mb-4"> <!-- Carte pour le produit -->
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 3"> <!-- Image du produit -->
                    <div class="card-body text-center"> <!-- Corps de la carte -->
                        <h5 class="card-title">Puzzle 3</h5> <!-- Titre du produit -->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> <!-- Description du produit -->
                        <button class="btn btn-success">Acheter</button> <!-- Bouton d'achat -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
