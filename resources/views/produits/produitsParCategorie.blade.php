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
