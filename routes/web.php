<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccueilController; // Ajoutez votre contrôleur d'accueil
use App\Http\Controllers\ProduitController; // Ajoutez votre contrôleur pour les puzzles
use App\Http\Controllers\CartController; // Ajoutez votre contrôleur pour le panier
use App\Http\Controllers\Auth\LoginController; // Authentification
use App\Http\Controllers\Auth\RegisterController; // Inscription

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route pour la page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Route pour la page des produits
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

// Route pour le panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');

// Route pour la connexion
Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'login'])->name('login.submit');

// Route pour l'inscription
Route::get('/register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/{post}/pdf', [PostController::class, 'getPostPdf']);



require __DIR__.'/auth.php';
