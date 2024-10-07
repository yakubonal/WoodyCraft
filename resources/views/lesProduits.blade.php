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


</body>
</html>



