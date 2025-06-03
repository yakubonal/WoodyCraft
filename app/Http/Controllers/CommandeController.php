<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\ArticleCommande;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function payer(Request $request)
    {
        $adresse = Adresse::find($request->adresse_id);

        // Vérifier si l'adresse est valide
        if (!$adresse || $adresse->user_id !== auth()->id()) {
            return redirect()->route('adresse.index')->with('error', 'Adresse non valide.');
        }

        return view('paiement.index', compact('adresse'));
    }

    public function index(Request $request) {
        // Obtention de l'utilisateur actuel
        $user = auth()->user();

        // Obtention des commandes de l'utilisateur
        $commandes = Commande::where('user_id', $user->id)->get();

        // Si le message n'est pas déjà défini dans la session, on le définit
        if (session()->has('message')) {
            $message = session()->get('message');
        }
        else {
            $message = $commandes->isEmpty() ? "Vous n'avez aucune commande." : null;
        }

        return view('commandes.index', [
            'commandes' => $commandes,
            'message' => $message,
        ]);
    }

    public function details(Request $request, $id) {
        // Obtention de l'utilisateur actuel
        $user = auth()->user();

        // TODO On vérifie si la commande appartient bien à l'utilisateur actuel

        // Obtention de la commande
        $commande = Commande::findOrFail($id);

        // Obtention des articles de la commande
        $articles_commande = ArticleCommande::where('commande_id', $commande->id)->get();

        // Création d'une liste qui contient chaque article et sa quantité
        $articles = [];

        foreach ($articles_commande as $article_commande) {
            // Obtention du produit associé à l'article panier
            $produit = Produit::findOrFail($article_commande->produit_id);

            // Ajout du produit
            $element = [
                "id" => $produit->id,
                "nom" => $produit->nom,
                "image_url" => "",
                "quantity" => $article_commande->quantity,
                "prix" => $produit->prix,
            ];

            // On ajoute chaque produit dans un array pour pouvoir générer le PDF
            array_push($articles, $element);
        }

        return view('commandes.detailsCommande', [
            'commande' => $commande,
            'articles' => $articles,
        ]);
    }
}
