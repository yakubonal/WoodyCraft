<x-app-layout>
    <div class="container">
        <div class="container my-5 position-relative">
            <a href="{{ route('categorie.index') }}" class="btn position-absolute start-0" style="top: -10px; background-color: #a3e4a1; color: #155724; border: 1px solid #81d48a;">Retour</a>
            <h1 class="text-center my-4">Wishlist</h1>
        </div>
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
    </div>
    <div class="row">
        <div class="col s12 cards-container">
            @if(isset($message))
            <div class="alert alert-warning text-center">
                {{ $message }}
            </div>
            @endif

            @foreach ($produits as $produit)
                <div class="card mb-4">
                    <div class="row g-0 d-flex align-items-center">
                        <!-- Affichage de l'image -->
                        <div class="col-md-4">
                            @if ($produit->image_url)
                                <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-image-url.png') }}" alt="Image par défaut" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produit->nom }}</h5>
                                <p class="card-text">{{ $produit->description }}</p>
                                <p class="card-text">Prix : {{ number_format($produit->prix, 2) }} €</p>
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Affichage de la quantité -->
                                    <span>{{ $produit->quantity }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
