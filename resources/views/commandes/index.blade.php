<x-app-layout>
    <div class="container">
        <div class="container my-5 position-relative">
            <a href="{{ route('categorie.index') }}" class="btn position-absolute start-0"
                style="top: -10px; background-color: #a3e4a1; color: #155724; border: 1px solid #81d48a;">Retour</a>
            <h1 class="text-center my-4">Commandes</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        <div class="row">
            <div class="col s12 cards-container">
                @if (isset($message))
                    <div class="alert alert-success text-center">
                        {{ $message }}
                    </div>
                @endif

                @foreach ($commandes as $commande)
                    <div class="card mb-4">
                        <div class="row g-0 d-flex align-items-center">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Commande n°{{ $commande->id }} du {{ $commande->date }}</h5>
                                    <p class="card-text">Statut : {{ $commande->statut }}</p>
                                    <p class="card-text">Type de paiement : {{ $commande->type_paiement }}</p>
                                    <p class="card-text">Total : {{ number_format($commande->montant_total, 2) }} €</p>
                                    <a class="btn btn-sm btn-success" href="{{ route('commande.details', $commande->id) }}">
                                        <i class="fa fa-circle-info mr-2"></i> Détails commande
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
