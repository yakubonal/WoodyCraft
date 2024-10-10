<!DOCTYPE html>
<html lang="fr"> <!-- Déclaration du type de document et langue -->
<head>
    <meta charset="UTF-8"> <!-- Définit le jeu de caractères utilisé -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive design pour s'adapter aux différentes tailles d'écran -->
    <title>WoodyCraft4Shop</title> <!-- Titre de la page -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Lien vers la feuille de style Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Lien vers les icônes Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Lien vers jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> <!-- Lien vers Popper.js, utilisé pour le positionnement des éléments -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Lien vers le fichier JavaScript de Bootstrap -->
    <style>
        .bg-image {
            background-image: url('../images/fond.jpg'); /* Assurez-vous que ce chemin est correct */
            background-size: cover; /* Couvre toute la zone sans déformation */
            background-position: center; /* Centre l'image dans le conteneur */
            background-repeat: no-repeat; /* Empêche l'image de se répéter */
            height: 300px; /* Hauteur du conteneur */
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="bg-image d-flex justify-content-center align-items-center">
            <h1 class="display-3 text-white">Bienvenue sur WoodyCraft4Shop</h1> <!-- Utilisation de la classe display-1 pour agrandir le texte -->
        </div>
        <div class="container my-4"> <!-- Conteneur pour la section des catégories -->
            <h2 class="display-4 text-center mb-4">Nos Catégories</h2> <!-- Titre pour la section des catégories -->
            <div class="text-center"> <!-- Centre les boutons -->
                @foreach($categories as $categorie)
                <a href="{{ route('produitParCategorie', $categorie->id) }}" class="btn btn-primary mx-2">
                    {{ $categorie->nom }}
                </a>
                @endforeach
            </div>
        </div>
    </x-app-layout>
</body>
</html>

