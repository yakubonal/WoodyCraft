<head>
    <style>
        .bg-image {
            background-image: url({{ asset('images/fond.jpg') }});
            background-size: cover; /* Couvre toute la zone sans déformation */
            background-position: center; /* Centre l'image dans le conteneur */
            background-repeat: no-repeat; /* Empêche l'image de se répéter */
            height: 300px; /* Hauteur du conteneur */
            background-color: rgba(0, 0, 0, 0.5); /* Filtre noir */
            background-blend-mode: darken; /* Mélange l'image avec le noir */
        }
    </style>
</head>

<x-app-layout>
    <div class="bg-image d-flex justify-content-center align-items-center">
        <h1 class="display-3 text-white">WoodyCraft4Shop</h1> <!-- Utilisation de la classe display-1 pour agrandir le texte -->
    </div>
    <div class="container my-4"> <!-- Conteneur pour la section des catégories -->
        <h2 class="display-4 text-center mb-4">Nos Catégories</h2> <!-- Titre pour la section des catégories -->
        <div class="text-center"> <!-- Centre les boutons -->
            @foreach($categories as $categorie)
            <a href="{{ route('categorie.show', $categorie->id) }}" class="btn btn-success mx-2">
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
                            <img src="{{ asset('images/default-image-url.png') }}" class="card-img-top" alt="Image par défaut">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text">{{ $produit->description }}</p>
                            <p class="card-text">Prix: {{ number_format($produit->prix, 2) }} €</p>
                            <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-success">Acheter</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
