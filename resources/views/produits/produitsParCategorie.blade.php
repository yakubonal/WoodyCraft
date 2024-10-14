<x-app-layout>
    <div class="container">
        <h1 class="text-center my-4">Produits de la catégorie : {{ $categorie->nom }}</h1>
        @if($produits->isEmpty())
            <p>Aucun produit disponible pour cette catégorie.</p>
        @else
            <div class="row">
                @foreach($produits as $produit)
                    <div class="col-md-4">
                        <div class="card mb-4">
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
                                <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary">Acheter</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
