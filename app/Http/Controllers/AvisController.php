<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Models\Produit;

class AvisController extends Controller
{
    // Affiche le formulaire d'avis
    public function formulaire($id)
    {
        // Récupère le produit
        $produit = Produit::findOrFail($id);

        return view('avis.formulaire', compact('produit'));
    }

    // Ajoute un avis à un article
    public function ajout(Request $request, $id)
    {
        // Récupère le produit
        $produit = Produit::findOrFail($id);

        // Obtention de l'id de l'utilisateur connecté
        $user = auth()->user();

        // Créé l'avis
        Avis::create([
            'user_id' => $user->id,
            'produit_id' => $produit->id,
            'note' => $request->note,
            'commentaire' => $request->commentaire,
        ]);

        return redirect()->route('commande.index')->with('message', 'Merci pour votre avis !');
    }
}
