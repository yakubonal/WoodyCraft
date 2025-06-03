<x-app-layout>
    <div class="container">
        <div class="container my-5 position-relative">
            <a href="{{ route('commande.index') }}" class="btn position-absolute start-0" style="top: -10px; background-color: #a3e4a1; color: #155724; border: 1px solid #81d48a;">Retour</a>
            <h1 class="text-center my-4">Détails commande</h1>
        </div>

        <div class="row">
            <div class="col s12 cards-container">
                @foreach ($articles as $article)
                    <div class="card mb-4">
                        <div class="row g-0 d-flex align-items-center">
                            <!-- Affichage de l'image -->
                            <div class="col-md-4">
                                @if ($article['image_url'])
                                    <img src="{{ $article['image_url'] }}" alt="{{ $article['nom'] }}" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-image-url.png') }}" alt="Image par défaut" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article['nom'] }}</h5>
                                    <p class="card-text">Prix : {{ number_format($article['prix'], 2) }} €</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <!-- Affichage de la quantité -->
                                        <span>Quantité : {{ $article['quantity'] }}</span>
                                    </div>
                                    <a class="btn btn-sm btn-success" href="{{ route('avis.formulaire', $article['id']) }}">
                                        <i class="fa fa-comments mr-2"></i> Laisser un avis
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Affichage du total -->
        <div class="flex-row-reverse mt-2 mb-5">
          <div class="p-2 bd-highlight">Total : {{ number_format($commande->montant_total, 2) }}€</div>
          <div class="p-2 bd-highlight">Payé par {{ $commande->type_paiement }}</div>
        </div>
    </div>
</x-app-layout>
