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
        <div class="container">
            <h1 class="my-4">Produits de la catégorie : {{ $categorie->nom }}</h1>

            @if($produits->isEmpty())
                <p>Aucun produit disponible pour cette catégorie.</p>
            @else
                <div class="row">
                    @foreach($produits as $produit)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ $produit->image }}" alt="{{ $produit->nom }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produit->nom }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                    <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </x-app-layout>
</body>
</html>


