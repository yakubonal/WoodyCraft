<x-app-layout>
    <div class="container">
        <h1 class="text-center my-4">Panier</h1>
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
                            <p class="card-text">Prix : {{ number_format($produit->prix, 2) }} €</p>
                            <p class="card-text">Quantité : {{ $produit->quantity }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
