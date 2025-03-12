<?php

namespace App\Http\Controllers;
use App\Models\ArticlePanier;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    // Obtient le panier s'il existe, sinon le créé
    public static function get_panier(Request $request)
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
        return $panier;
    }

    // Calcule le prix total du contenu d'un panier
    public static function get_total(Panier $panier)
    {
        // Obtention de tous les articles avec le panier_id qu'on cherche
        $articles = ArticlePanier::where('panier_id', $panier->id)->get();

        $total = 0.0;

        // Pour chaque ArticlePanier, on obtient sa quantité et son Produit (pour avoir son prix)
        foreach ($articles as $article) {
            $prix = Produit::findOrFail($article->produit_id)->prix;

            // Ajout au total de la quantité * le prix individuel de chaque produit
            $total += $article->quantity * $prix;
        }

        return $total;
    }

    // Affiche le contenu du panier
    public function index(Request $request)
    {
        $panier = $this->get_panier($request);

        if (!$panier) {
            return view('produits.panier', ['produits' => [], 'message' => 'Votre panier est vide.']);
        }

        // Obtention de la liste des produits du panier
        $produits = Produit::join('article_panier', 'article_panier.produit_id', '=', 'produit.id')
        ->where('article_panier.panier_id', $panier->id)
        ->get(['produit.*', 'article_panier.quantity as quantity']);

        return view('produits.panier', [
        'produits' => $produits,
        'message' => $produits->isEmpty() ? 'Votre panier est vide.' : null,
        'total' => $this->get_total($panier),
        ]);
    }

    // Fonction qui permet d'ajouter un produit au panier
    public function ajout(Request $request)
    {
        $panier = $this->get_panier($request);

        // Si le produit est déjà dans le panier
            // Modifier la quantite selon le produit
        //Sionon ajout du produit dans panier

        // Vérification si le produit est déjà dans le panier
        $article = ArticlePanier::where('produit_id', $request->produit_id)
            ->where('panier_id', $panier->id)
            ->first();

        if ($article) {
            // Si le produit est déjà dans le panier, on augmente la quantité
            $article->quantity += $request->quantity;
            $article->save();
        } else {
            // Ajout du produit dans le panier associé à l'utilisateur
            ArticlePanier::create([
                'produit_id' => Produit::findOrFail($request->produit_id)->id,
                'panier_id' => $panier->id,
                'quantity' => $request->quantity,
            ]);
        }

        // Affichage du panier
        return redirect('/panier');
    }

    /**
     * Modifier la quantité d'un produit dans le panier.
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

        // Récupérer le panier actuel
        $panier = $this->get_panier($request);

        // Trouver l'article du panier correspondant au produit
        $article = ArticlePanier::where('produit_id', $produit_id)
            ->where('panier_id', $panier->id)
            ->first();

        if ($article) {
            // Modifier la quantité
            $article->quantity += $request->quantity;

            if ($article->quantity < 1) {
                // Supprimer l'article si la quantité est inférieure à 1
                $article->delete();
                return redirect()->back()->with('success', 'Produit supprimé du panier.');
            } else {
                // Sauvegarder les modifications
                $article->save();
                return redirect()->back()->with('success', 'Quantité mise à jour.');
            }
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier.');
    }

    /**
     * Supprimer un produit du panier.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $produit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supprimer(Request $request, $produit_id)
    {
        // Récupérer le panier actuel
        $panier = $this->get_panier($request);

        // Trouver l'article du panier correspondant au produit
        $article = ArticlePanier::where('produit_id', $produit_id)
            ->where('panier_id', $panier->id)
            ->first();

        if ($article) {
            // Supprimer l'article du panier
            $article->delete();
            return redirect()->back()->with('error', 'Produit supprimé du panier.');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier.');
    }
}
