<?php

namespace App\Http\Controllers;

use App\Models\ArticleWishlist;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Produit;

class WishlistController extends Controller
{
    // Obtient la wishlist s'il existe, sinon le créé
    public static function get_wishlist(Request $request)
    {
        // Obtention de l'id de l'utilisateur connecté
        $user = auth()->user();

        // Si l'user est connecté
        if (! is_null($user))
        {
            $wishlist = Wishlist::findOrFail($user->wishlist_id);
        }
        // Si l'user n'est pas connecté (invité)
        else
        {
            $session_id = $request->session()->getId();
            $wishlist = Wishlist::where('session_id', $session_id)->first();

            // Si la wishlist n'existe pas, on le créé
            if ($wishlist === null) {
                $wishlist = Wishlist::create([
                    'session_id' => $session_id,
                ]);
            }
        }
        return $wishlist;
    }

    // Affiche le contenu du wishlist
    public function index(Request $request)
    {
        $wishlist = $this->get_wishlist($request);

        if (!$wishlist) {
            return view('produits.wishlist', ['produits' => [], 'message' => 'Votre wishlist est vide.']);
        }

        // Obtention de la liste des produits du wishlist
        $produits = Produit::join('article_wishlist', 'article_wishlist.produit_id', '=', 'produit.id')
        ->where('article_wishlist.wishlist_id', $wishlist->id)
        ->get(['produit.*', 'article_wishlist.quantity as quantity']);

        return view('produits.wishlist', [
        'produits' => $produits,
        'message' => $produits->isEmpty() ? 'Votre wishlist est vide.' : null,
        ]);
    }

    // Fonction qui permet d'ajouter un produit au wishlist
    public function ajout(Request $request)
    {
        $wishlist = $this->get_wishlist($request);

        // Vérification si le produit est déjà dans la wishlist
        $article = ArticleWishlist::where('produit_id', $request->produit_id)
            ->where('wishlist_id', $wishlist->id)
            ->first();

        if ($article) {
            // Si le produit est déjà dans la wishlist, on augmente la quantité
            $article->quantity += $request->quantity;
            $article->save();
        } else {
            // Ajout du produit dans la wishlist associé à l'utilisateur
            ArticleWishlist::create([
                'produit_id' => Produit::findOrFail($request->produit_id)->id,
                'wishlist_id' => $wishlist->id,
                'quantity' => $request->quantity,
            ]);
        }

        // Affichage du wishlist
        return redirect('/wishlist');
    }
}
