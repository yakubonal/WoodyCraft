<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    // Affiche le contenu du panier
    public function index()
    {
        // Logique pour récupérer les articles du panier
        return view('produits/panier'); 
    }
}

