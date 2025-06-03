<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Models\Produit; // Modèle Produit
use App\Models\User;

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
        $produit = Produit::findOrFail($id);

        $avis = Avis::where('produit_id', $produit->id)->get();

        $data = [];

        foreach ($avis as $un_avis) {
            // Ajout du produit
            $element = [
                "nom_user" => $un_avis->user->name,
                "note" => $un_avis->note,
                "commentaire" => $un_avis->commentaire,
            ];

            // On ajoute chaque produit dans un array pour pouvoir générer le PDF
            array_push($data, $element);
        }

        return view('produits.unProduit', [
            'produit' => $produit,
            'avis' => $data,
        ]);
    }
}
