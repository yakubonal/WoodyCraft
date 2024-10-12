<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit; // Modèle Produit
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Méthode pour afficher toutes les catégories
    public function index()
    {
        // Récupère toutes les catégories depuis la base de données
        $categories = Categorie::all(); // 'Categorie' avec majuscule

        // Retourne la vue 'accueil' avec les catégories
        return view('accueil', compact('categories'));
    }

    // Méthode pour afficher les produits (puzzles) par catégorie
    public function show($id)
    {
        // Récupérer la catégorie et ses produits
        $categorie = Categorie::findOrFail($id);
        $produits = Produit::where('categorie_id', $id)->get(); // Récupérer les produits de la catégorie

        // Vérification des données
        if ($produits->isEmpty()) {
            // Si aucun produit n'est trouvé, on envoie une collection vide
            return view('produits.produitsParCategorie', ['produits' => collect(), 'categorie' => $categorie]);
        }

        // Si des produits sont trouvés, passez-les à la vue
        return view('produits.produitsParCategorie', ['produits' => $produits, 'categorie' => $categorie]);
    }
}
