<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // Assurez-vous que le modèle Product existe
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        // Récupérer la catégorie par ID
        $category = Category::findOrFail($id);

        // Récupérer les produits de la catégorie
        $products = Product::where('category_id', $id)->get(); // Assurez-vous que la colonne 'category_id' existe

        return view('categories.show', compact('category', 'products'));
    }
}

