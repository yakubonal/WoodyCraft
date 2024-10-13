<?php

namespace App\Http\Controllers;
use App\Models\ArticlePanier;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    // Affiche le contenu du panier
    public function index(Request $request)
    {
        // Obtention de l'id de l'utilisateur connecté
        $user = auth()->user();

        // Si l'user est connecté
        if (! is_null($user))
        {
            $panier = Panier::findOrFail($user->panier_id);
        }
        // Si l'user n'est pas connecté (invité)
        else
        {
            $session_id = $request->session()->getId();
            $panier = Panier::where('session_id', $session_id)->first();

            // Si le panier n'existe pas, on le créé
            if ($panier === null) {
                $panier = Panier::create([
                    'session_id' => $session_id,
                ]);
            }
        }

        // Obtention de la liste des produits du panier
        $produits = Produit::with('articles')
        ->join('article_panier', 'article_panier.produit_id', '=', 'produit.id')
        ->join('panier', 'article_panier.panier_id', '=', 'panier.id')
        ->where('panier.id', $panier->id)
        ->get();

        return view('produits/panier', ['produits' => $produits]);
    }

    // Si l'user est connecté
    //     Si il a un panier
    //         Récupération de l'id de son panier
    //     Si aucun panier n'est associé
    //         Création du panier
    // Si l'user n'est pas connecté
    //     Si il a un panier
    //         Récupération du panier associé
    //     Si aucun panier n'est associé
    //         Création d'un panier avec un ID unique à cet utilisateur (à sa session), comme par exemple : session_id

    // Fonction qui permet d'ajouter un produit au panier
    public function ajout(Request $request)
    {
        // Obtention de l'id de l'utilisateur connecté
        $user = auth()->user();

        // Si l'user est connecté
        if (! is_null($user))
        {
            $panier = Panier::findOrFail($user->panier_id);
        }
        // Si l'user n'est pas connecté (invité)
        else
        {
            $session_id = $request->session()->getId();
            $panier = Panier::where('session_id', $session_id)->first();

            // Si le panier n'existe pas, on le créé
            if ($panier === null) {
                $panier = Panier::create([
                    'session_id' => $session_id,
                ]);
            }
        }

        // TODO Si le produit est déjà dans le panier, modifier sa quantité

        // Ajout du produit dans le panier associé à l'utilisateur
        ArticlePanier::create([
            'produit_id' => Produit::findOrFail($request->produit_id)->id,
            'panier_id' => $panier->id,
            'quantity' => $request->quantity,
        ]);

        // Obtention de la liste des produits du panier
        $produits = Produit::with('articles')
        ->join('article_panier', 'article_panier.produit_id', '=', 'produit.id')
        ->join('panier', 'article_panier.panier_id', '=', 'panier.id')
        ->where('panier.id', $panier->id)
        ->get();

        // Affichage du panier
        return view('produits/panier', ['produits' => $produits]);
    }
}
