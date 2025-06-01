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

    // Affiche le contenu de la wishlist
    public function index(Request $request)
    {
        $wishlist = $this->get_wishlist($request);

        if (!$wishlist) {
            return view('produits.wishlist', ['produits' => [], 'message' => 'Votre wishlist est vide.']);
        }

        // Obtention de la liste des produits de la wishlist
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

        // Affichage de la wishlist
        return redirect('/wishlist');
    }

    /**
     * Modifier la quantité d'un produit dans la wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $produit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function modifier(Request $request, $produit_id)
    {
        // Validation des données entrantes
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        // Récupérer la wishlist actuel
        $wishlist = $this->get_wishlist($request);

        // Trouver l'article de la wishlist correspondant au produit
        $article = ArticleWishlist::where('produit_id', $produit_id)
            ->where('wishlist_id', $wishlist->id)
            ->first();

        if ($article) {
            // Modifier la quantité
            $article->quantity += $request->quantity;

            if ($article->quantity < 1) {
                // Supprimer l'article si la quantité est inférieure à 1
                $article->delete();
                return redirect()->back()->with('success', 'Produit supprimé de la wishlist.');
            } else {
                // Sauvegarder les modifications
                $article->save();
                return redirect()->back()->with('success', 'Quantité mise à jour.');
            }
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans la wishlist.');
    }

    /**
     * Supprimer un produit de la wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $produit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supprimer(Request $request, $produit_id)
    {
        // Récupérer la wishlist actuel
        $wishlist = $this->get_wishlist($request);

        // Trouver l'article de la wishlist correspondant au produit
        $article = Articlewishlist::where('produit_id', $produit_id)
            ->where('wishlist_id', $wishlist->id)
            ->first();

        if ($article) {
            // Supprimer l'article de la wishlist
            $article->delete();
            return redirect()->back()->with('error', 'Produit supprimé de la wishlist.');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans la wishlist.');
    }
}
