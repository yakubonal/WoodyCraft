<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Méthode pour afficher l'accueil avec les catégories
    public function accueil()
    {
        $categories = Categorie::all(); // Récupère toutes les catégories
        return view('accueil', compact('categories'));
    }

    // Méthode pour afficher les puzzles par catégorie
    public function show($id)
    {
        $puzzles = Puzzle::where('categorie_id', $id)->get(); // Récupère les puzzles associés à la catégorie
        return view('puzzles.index', compact('puzzles'));
    }
}

