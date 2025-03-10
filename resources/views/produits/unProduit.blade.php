<x-app-layout>
    <div class="container my-5">
        <div class="container my-5 position-relative">
            <!-- Bouton "Retour" légèrement plus haut que le titre -->
            <a href="{{ route('lesproduits.index') }}" class="btn btn-secondary position-absolute start-0" style="top: -10px;">Retour</a>
            <h1 class="text-center my-5 py-4">{{ $produit->nom }}</h1>
            <div class="row">
                <div class="col-md-6">
                    @if ($produit->image_url)
                        <img src="{{ $produit->image_url }}" class="img-fluid" alt="{{ $produit->nom }}">
                    @else
                        <img src="{{ asset('images/default-image-url.png') }}" class="img-fluid" alt="Image par défaut">
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Description :</h5>
                    <p>{{ $produit->description }}</p>
                    <p><strong>Prix : {{ number_format($produit->prix, 2) }} €</strong></p>
                    
                    <form method="POST" action="{{ route('panier.ajout') }}">
                        @csrf
                        <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                        <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mb-2" min="0" max="10">
                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
