<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\PaiementController;

// Route pour la page d'accueil
Route::get('/', function () {
    return view('accueil'); // Retourne la vue 'accueil' lorsque la route est accédée
})->name('accueil'); // Donne un nom à cette route

// Route pour la page des lesproduits
Route::get('/lesproduits', [ProduitController::class, 'index'])->name('lesproduits.index'); // Appelle la méthode 'index' du ProduitController

Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');

Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');
Route::get('/categorie/{id}', [CategorieController::class, 'show'])->name('categorie.show');

// Route pour le panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index'); // Appelle la méthode 'index' du PanierController
Route::post('/panier', [PanierController::class, 'ajout'])->name('panier.ajout'); // Appelle la méthode 'ajout' du PanierController
Route::patch('/panier/{produit}/modifier', [PanierController::class, 'modifier'])->name('panier.modifier');
Route::delete('/panier/{produit}/supprimer', [PanierController::class, 'supprimer'])->name('panier.supprimer');

Route::get('/adresse', [AdresseController::class, 'index'])->name('adresse.index');
Route::post('/adresse', [AdresseController::class, 'store'])->name('adresse.store');

// Route pour générer un PDF d'un post spécifique
Route::get('/posts/{post}/pdf', [PostController::class, 'getPostPdf']); // Appelle la méthode pour générer un PDF du post

Route::get('/paiement/{adresse}', [PaiementController::class, 'index'])->name('paiement.index');
Route::post('/paiement/paypal', [PaiementController::class, 'paypal'])->name('paiement.paypal');
Route::post('/paiement/cheque', [PaiementController::class, 'cheque'])->name('paiement.cheque');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__.'/auth.php'; // Charge les routes d'authentification
