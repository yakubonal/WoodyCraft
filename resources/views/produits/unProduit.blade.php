<x-app-layout>
    <div class="container my-5">
        <div class="container my-5 position-relative">
            <a href="{{ route('categorie.index') }}" class="btn position-absolute start-0" style="top: -10px; background-color: #a3e4a1; color: #155724; border: 1px solid #81d48a;">Retour</a>
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

                    <form method="POST">
                        @csrf
                        <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                        <input type="number" name="quantity" id="quantity" placeholder="Quantité ?" class="form-control mb-2" min="0" max="10">
                        <button type="submit" id="addToCartBtn" class="btn btn-success" formaction="{{ route('panier.ajout') }}">Ajouter au panier</button>
                        <button type="submit" id="addToWishlistBtn" class="btn btn-success" formaction="{{ route('wishlist.ajout') }}">Ajouter au wishlist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sélectionner l'input quantity et le bouton
        const quantityInput = document.getElementById('quantity');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const addToWishlistBtn = document.getElementById('addToWishlistBtn');

        // Désactiver ou activer le bouton en fonction de la quantité
        quantityInput.addEventListener('input', function() {
            if (quantityInput.value > 0) {
                addToCartBtn.disabled = false;
                addToWishlistBtn.disabled = false; // Activer le bouton si la quantité est supérieure à 0
            } else {
                addToCartBtn.disabled = true;
                addToWishlistBtn.disabled = true; // Désactiver le bouton si la quantité est 0 ou moins
            }
        });

        // Initialiser l'état du bouton au chargement de la page
        if (quantityInput.value <= 0) {
            addToCartBtn.disabled = true;
            addToWishlistBtn.disabled = true; // Assurez-vous que le bouton est désactivé par défaut
        }
    </script>
</x-app-layout>
