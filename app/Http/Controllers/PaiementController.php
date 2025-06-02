<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Commande;
use App\Models\Panier;
use App\Http\Controllers\PanierController;
use App\Models\ArticleCommande;
use App\Models\ArticlePanier;
use App\Models\Produit;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;

class PaiementController extends Controller
{
    public function index(Adresse $adresse)
    {
        return view('paiement.index', compact('adresse'));
    }

    public static function ajouter_commande(Request $request, string $type_paiement) {
        // Obtention du panier
        $panier = PanierController::get_panier($request);

        // Obtention du montant total du panier
        $total = PanierController::get_total($panier);

        // Obtention de l'utilisateur actuel
        $user = auth()->user();

        // Ajouter le contenu du panier à la table "Commandes"
        $commande = Commande::create([
            'adresse_id' => $panier->adresse_id,
            'user_id' => isset($user->id) ? $user->id : null,
            'statut' => "ok",
            'type_paiement' => $type_paiement,
            'montant_total' => $total,
            'date' => new DateTime(),
        ]);

        // Obtention des articles du panier
        $articles_panier = ArticlePanier::where('panier_id', $panier->id)->get();

        // Ajout du contenu de la commande dans la table "article_commande"
        foreach ($articles_panier as $article) {
            // Obtention du produit associé à l'article panier
            $produit = Produit::findOrFail($article->produit_id);

            ArticleCommande::create([
                'commande_id' => $commande->id,
                'produit_id' => $produit->id,
                'quantity' => $article->quantity,
            ]);
        }

        // Supprimer les articles du panier de l'utilisateur
        ArticlePanier::where('panier_id', $panier->id)->delete();
    }

    public function paypal(Request $request)
    {
        $this->ajouter_commande($request, "paypal");

        // Logique PayPal à implémenter
        return redirect('https://www.paypal.com');
    }

    public function cheque(Request $request)
    {
        // Obtention du panier
        $panier = PanierController::get_panier($request);

        // Obtention des articles du panier
        $articles_panier = ArticlePanier::where('panier_id', $panier->id)->get();
        $data = [];

        foreach ($articles_panier as $article) {
            // Obtention du produit associé à l'article panier
            $produit = Produit::findOrFail($article->produit_id);

            // Ajout du produit
            $element = [
                "nom" => $produit->nom,
                "quantite" => $article->quantity,
                "prix" => $produit->prix,
            ];

            // On ajoute chaque produit dans un array pour pouvoir générer le PDF
            array_push($data, $element);
        }

        // Charger la vue Blade avec le contenu de la facture
        $pdf = Pdf::loadView('pdf.facture', [
            'total' => PanierController::get_total($panier),
            'articles' => $data,
        ]);

        $this->ajouter_commande($request, "cheque");

        return $pdf->stream('facture.pdf');
    }
}
