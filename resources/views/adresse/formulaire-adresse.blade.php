<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center">Saisie de l'adresse</h1>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        <form action="{{ route('adresse.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="rue">Rue :</label>
                <input type="text" name="rue" value="{{ $adresse->rue }}" class="form-control" id="rue" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="{{ $adresse->ville }}" class="form-control" id="ville" required>
            </div>

            <div class="form-group">
                <label for="code_postal">Code Postal :</label>
                <input type="text" name="code_postal" value="{{ $adresse->code_postal }}" class="form-control" id="code_postal" required>
            </div>

            <div class="form-group">
                <label for="pays">Pays :</label>
                <input type="text" name="pays" value="{{ $adresse->pays }}" class="form-control" id="pays" required>
            </div>

            @auth
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="enregistrer_adresse" value="" id="enregistrer_adresse">
                    <label class="form-check-label" for="enregistrer_adresse">Enregistrer cette adresse</label>
                </div>
            </div>
            @endauth

            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>
</x-app-layout>
