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
    <style>
        .bg-image {
            background-image: url('../images/fond.jpg'); /* Assurez-vous que ce chemin est correct */
            background-size: cover; /* Couvre toute la zone sans déformation */
            background-position: center; /* Centre l'image dans le conteneur */
            background-repeat: no-repeat; /* Empêche l'image de se répéter */
            height: 300px; /* Hauteur du conteneur */
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="bg-image d-flex justify-content-center align-items-center">
            <h1 class="display-3 text-white">Bienvenue sur WoodyCraft4Shop</h1> <!-- Utilisation de la classe display-1 pour agrandir le texte -->
        </div>
        <div class="container my-4"> <!-- Conteneur pour la section des catégories -->
            <h2 class="display-4 text-center mb-4">Nos Catégories</h2> <!-- Titre pour la section des catégories -->
            <div class="text-center"> <!-- Centre les boutons -->
                @foreach($categories as $categorie)
                <a href="{{ route('categorie.show', $categorie->id) }}" class="btn btn-primary mx-2">
                    {{ $categorie->nom }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="container">
            <h1 class="text-center my-4">Nos Produits</h1>
            <div class="row">
                @foreach ($produits as $produit)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <!-- Vérification si l'image existe avant de l'afficher -->
                            @if ($produit->image_url)
                                <img src="{{ $produit->image_url }}" class="card-img-top" alt="{{ $produit->nom }}">
                            @else
                                <img src="default-image-url.jpg" class="card-img-top" alt="Image par défaut">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $produit->nom }}</h5>
                                <p class="card-text">{{ $produit->description }}</p>
                                <p class="card-text">Prix: {{ number_format($produit->prix, 2) }} €</p>
                                <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary">Acheter</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>
</body>
</html>
