<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit; // Modèle Produit

class ProduitController extends Controller
{
    // Affiche la liste des puzzles
    public function index()
    {
        // Récupère tous les produits depuis la base de données
        $produits = Produit::all(); // 'Produit' avec majuscule

        // Retourne la vue 'lesproduits' avec la variable $produits
        return view('produits.lesproduits', compact('produits')); // Utilisation correcte de la vue
    }

    // Affiche un produit spécifique
    public function show($id)
    {
        $produit = Produit::findOrFail($id); // Récupère le produit par son ID ou génère une erreur 404
        return view('produits.unProduit', compact('produit')); // Passe le produit à la vue
    }
}
