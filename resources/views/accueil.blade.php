<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodyCraft4Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
        <nav class="d-flex align-items-center">
            <span class="header-title text-white mx-3">WoodyCraft4Shop</span>
            <a href="{{ route('accueil') }}" class="text-white mx-3 hover:underline">Accueil</a>
            <a href="{{ route('produits.index') }}" class="text-white mx-3 hover:underline">Les produits</a>
        </nav>
        <div class="d-flex align-items-center">
            <a href="{{ route('panier.index') }}" class="text-white mx-3 hover:underline"><i class="fas fa-shopping-cart"></i></a>
            <a href="{{ route('login') }}" class="text-white mx-3 hover:underline">Se connecter</a>
            <a href="{{ route('register') }}" class="text-white mx-3 hover:underline">S'inscrire</a>
        </div>
    </header>

    <div class="container mt-4">
        <div class="jumbotron text-center">
            <h2>WoodyCraft4Shop</h2>
            <p>This site is built with a flex layout, aligned and padded for the content will be centered horizontally and vertically.</p>
        </div>

        <div class="mb-4">
            <h3>Les catégories</h3>
            <div class="btn-group flex-wrap" role="group" aria-label="Catégories">
                <button type="button" class="btn btn-outline-secondary">Animaux</button>
                <button type="button" class="btn btn-outline-secondary">Architecture</button>
                <button type="button" class="btn btn-outline-secondary">Fantastiques</button>
                <button type="button" class="btn btn-outline-secondary">Engins Spéciaux</button>
                <button type="button" class="btn btn-outline-secondary">Musique</button>
                <button type="button" class="btn btn-outline-secondary">Paysages</button>
                <button type="button" class="btn btn-outline-secondary">Objets</button>
                <button type="button" class="btn btn-outline-secondary">Sports</button>
                <button type="button" class="btn btn-outline-secondary">Monuments</button>
                <button type="button" class="btn btn-outline-secondary">Véhicules</button>
            </div>
        </div>

        <h3>Les produits populaires</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Puzzle 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-success">Acheter</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Puzzle 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-success">Acheter</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Puzzle 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Puzzle 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-success">Acheter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



