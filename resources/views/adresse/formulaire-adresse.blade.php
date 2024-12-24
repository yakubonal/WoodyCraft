<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center">Saisie de l'adresse</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        @auth
            @if($adresseExistante)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Votre adresse enregistrée</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $adresseExistante->rue }}</p>
                        <p>{{ $adresseExistante->code_postal }} {{ $adresseExistante->ville }}</p>
                        <p>{{ $adresseExistante->pays }}</p>
                        <form action="{{ route('adresse.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="utiliser_adresse_existante" value="1">
                            <button type="submit" class="btn btn-success">Utiliser cette adresse</button>
                        </form>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Ou saisir une nouvelle adresse</h5>
                </div>
            @endif
        @endauth

        <form action="{{ route('adresse.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="rue">Rue :</label>
                <input type="text" name="rue" class="form-control" id="rue" required>
            </div>
            <div class="form-group mb-3">
                <label for="ville">Ville :</label>
                <input type="text" name="ville" class="form-control" id="ville" required>
            </div>
            <div class="form-group mb-3">
                <label for="code_postal">Code Postal :</label>
                <input type="text" name="code_postal" class="form-control" id="code_postal" required>
            </div>
            <div class="form-group mb-3">
                <label for="pays">Pays :</label>
                <input type="text" name="pays" class="form-control" id="pays" required>
            </div>

            @auth
            <div class="form-group mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="enregistrer_adresse" id="enregistrer_adresse">
                    <label class="form-check-label" for="enregistrer_adresse">Enregistrer cette adresse</label>
                </div>
            </div>
            @endauth

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</x-app-layout>
