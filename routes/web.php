<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici, vous pouvez enregistrer les routes web pour votre application.
| Ces routes sont chargées par le RouteServiceProvider et toutes
| seront assignées au groupe de middleware "web". Créez quelque chose de grand !
|
*/

// Route pour la page d'accueil
Route::get('/', function () {
    return view('accueil'); // Retourne la vue 'accueil' lorsque la route est accédée
})->name('accueil'); // Donne un nom à cette route

// Route pour la page des lesproduits
Route::get('/lesproduits', [ProduitController::class, 'index'])->name('lesproduits.index'); // Appelle la méthode 'index' du ProduitController

Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');

Route::get('/categorie/{id}', [CategorieController::class, 'show'])->name('produitsParCategorie.show');

// Route pour le panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index'); // Appelle la méthode 'index' du CartController

// Route pour la connexion
Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login'); // Affiche le formulaire de connexion
Route::post('/login', [Auth\LoginController::class, 'login'])->name('login.submit'); // Traite la soumission du formulaire de connexion

// Route pour l'inscription
Route::get('/register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register'); // Affiche le formulaire d'inscription
Route::post('/register', [Auth\RegisterController::class, 'register'])->name('register.submit'); // Traite la soumission du formulaire d'inscription

// Groupement des routes qui nécessitent une authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Affiche le formulaire d'édition du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Traite la mise à jour du profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Supprime le profil de l'user
});

Route::get('/', [CategorieController::class, 'accueil'])->name('accueil');

// Route pour accéder au tableau de bord
Route::get('/dashboard', function () {
    // Retourne la vue 'dashboard' lorsque la route est accédée
    return view('dashboard');
})->middleware(['auth', 'verified']) // Applique les middleware 'auth' et 'verified' pour protéger l'accès
->name('dashboard'); // Nomme cette route 'dashboard'


// Route pour générer un PDF d'un post spécifique
Route::get('/posts/{post}/pdf', [PostController::class, 'getPostPdf']); // Appelle la méthode pour générer un PDF du post

require __DIR__.'/auth.php'; // Charge les routes d'authentification
