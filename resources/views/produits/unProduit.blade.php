<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center">{{ $produit->nom }}</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Vérification si l'image existe avant de l'afficher -->
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
                    <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mr-2" min="0" max="10" >
                    <button type="submit" class="btn btn-primary">Ajouter au panier</a>
                </form>
            </div>
        </div>
        <a href="{{ route('lesproduits.index') }}" class="btn btn-secondary mt-4">Retour</a>
    </div>
</x-app-layout>
