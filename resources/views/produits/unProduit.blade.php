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
    <x-app-layout>
        <div class="container my-5">
            <h1 class="text-center">{{ $produit->nom }}</h1>
            <div class="row">
                <div class="col-md-6">
                    <!-- Vérification si l'image existe avant de l'afficher -->
                    @if ($produit->image_url)
                        <img src="{{ $produit->image_url }}" class="img-fluid" alt="{{ $produit->nom }}">
                    @else
                        <img src="default-image-url.jpg" class="img-fluid" alt="Image par défaut">
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Description :</h5>
                    <p>{{ $produit->description }}</p>
                    <p><strong>Prix : {{ number_format($produit->prix, 2) }} €</strong></p>
                    <a href="#" class="btn btn-primary">Ajouter au panier</a>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">Retour</a>
        </div>
    </x-app-layout>
</body>
</html>


