<x-app-layout>
    <div class="container">
        <h1 class="text-center my-4">Laisser un avis</h1>
        <div class="row">
            <div class="col s12 cards-container">
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="row g-0 d-flex align-items-center">
                            <!-- Affichage de l'image -->
                            <div class="col-sm">
                                @if ($produit->image_url)
                                    <img src="{{ $article['image_url'] }}" alt="{{ $article['nom'] }}"
                                        class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-image-url.png') }}" alt="Image par défaut"
                                        class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produit->nom }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                    <p class="card-text">Prix: {{ number_format($produit->prix, 2) }} €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('avis.ajout', $produit->id) }}">
            @csrf
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" placeholder="Votre avis"></textarea>
            </div>
            <div class="form-group mb-2">
                <label">Note sur 5</label>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="note" id="note1" value="1">
                    <label class="form-check-label" for="note1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="note" id="note2" value="2">
                    <label class="form-check-label" for="note2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="note" id="note3" value="3">
                    <label class="form-check-label" for="note3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="note" id="note4" value="4">
                    <label class="form-check-label" for="note4">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="note" id="note5" value="5">
                    <label class="form-check-label" for="note5">5</label>
                </div>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-success mb-2">Envoyer l'avis</button>
            </div>
        </form>
    </div>
</x-app-layout>
