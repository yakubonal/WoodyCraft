<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\PaiementController;
use App\Http\Controllers\WishlistController;

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

// Route pour la wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist', [WishlistController::class, 'ajout'])->name('wishlist.ajout');
Route::post('/wishlist/{produit}/deplacer', [WishlistController::class, 'deplacer'])->name('wishlist.deplacer');
Route::patch('/wishlist/{produit}/modifier', [WishlistController::class, 'modifier'])->name('wishlist.modifier');
Route::delete('/wishlist/{produit}/supprimer', [WishlistController::class, 'supprimer'])->name('wishlist.supprimer');


Route::get('/adresse', [AdresseController::class, 'index'])->name('adresse.index');
Route::post('/adresse', [AdresseController::class, 'store'])->name('adresse.store');

Route::get('/paiement/{adresse}', [PaiementController::class, 'index'])->name('paiement.index');
Route::post('/paiement/paypal', [PaiementController::class, 'paypal'])->name('paiement.paypal');
Route::post('/paiement/cheque', [PaiementController::class, 'cheque'])->name('paiement.cheque');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
Route::get('/commande/{id}', [CommandeController::class, 'details'])->name('commande.details');
Route::post('/commande/payer', [CommandeController::class, 'payer'])->name('commande.payer');

Route::get('/avis/{id}', [AvisController::class, 'formulaire'])->name('avis.formulaire');
Route::post('/avis/{id}', [AvisController::class, 'ajout'])->name('avis.ajout');

require __DIR__.'/auth.php'; // Charge les routes d'authentification
