<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Affiche la liste des puzzles
    public function index()
    {
        // Logique pour récupérer les puzzles depuis la base de données
        return view('lesProduits'); 
    }
}

