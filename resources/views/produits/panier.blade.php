<x-app-layout>
    <div class="container">
        <h1 class="text-center my-4">Panier</h1>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        <div class="row">
            <div class="col s12 cards-container">
                @foreach ($produits as $produit)
                    <div class="card mb-4">
                        <div class="row g-0 d-flex align-items-center">
                            <!-- Affichage de l'image -->
                            <div class="col-md-4">
                                @if ($produit->image_url)
                                    <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="img-fluid" style="max-width: 150px;">
                                @else
                                    <img src="{{ asset('images/default-image-url.png') }}" alt="Image par défaut" class="img-fluid" style="max-width: 150px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produit->nom }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                    <p class="card-text">Prix : {{ number_format($produit->prix, 2) }} €</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <!-- Formulaire pour diminuer la quantité -->
                                        <form action="{{ route('panier.modifier', $produit->id) }}" method="POST" class="me-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="-1">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">-</button>
                                        </form>

                                        <!-- Affichage de la quantité -->
                                        <span>{{ $produit->quantity }}</span>

                                        <!-- Formulaire pour augmenter la quantité -->
                                        <form action="{{ route('panier.modifier', $produit->id) }}" method="POST" class="ms-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                        </form>
                                    </div>

                                    <!-- Formulaire pour supprimer le produit -->
                                    <form action="{{ route('panier.supprimer', $produit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit du panier ?');">
                                            <i class="fa fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Nouveau bouton pour aller à la page d'adresse avant le paiement -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('categorie.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('adresse.index') }}" class="btn btn-secondary mt-4">Procéder au paiement</a>
        </div>
    </div>
</x-app-layout>
