<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Commande;
use App\Models\Panier;
use App\Http\Controllers\PanierController;
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

    public function paypal(Request $request)
    {
        // Obtention du panier
        $panier = PanierController::get_panier($request);

        // Obtention du montant total du panier
        $total = PanierController::get_total($panier);

        // Ajouter le contenu du panier à la table "Commandes"
        Commande::create([
            'panier_id' => $panier->id,
            'adresse_id' => $panier->adresse_id,
            'statut' => "ok",
            'type_paiement' => "paypal",
            'montant_total' => $total,
            'date' => new DateTime(),
        ]);

        // Supprimer les articles du panier de l'utilisateur
        ArticlePanier::where('panier_id', $panier->id)->delete();

        // Logique PayPal à implémenter
        return redirect('https://www.paypal.com');
    }

    public function cheque(Request $request)
    {
        // Obtention du panier
        $panier = PanierController::get_panier($request);

        // Obtention du montant total du panier
        $total = PanierController::get_total($panier);

        // Obtention des articles du panier
        $articles_panier = ArticlePanier::where('panier_id', $panier->id)->get();
        $data = [];

        foreach ($articles_panier as $article) {
            // Obtention du produit associé à l'article panier
            $p = Produit::findOrFail($article->produit_id);

            // Ajout du produit
            $element = [
                "nom" => $p->nom,
                "quantite" => $article->quantity,
                "prix" => $p->prix,
            ];

            array_push($data, $element);
        }

        // Charger la vue Blade avec le contenu de la facture
        $pdf = Pdf::loadView('pdf.facture', [
            'total' => $total,
            'articles' => $data,
        ]);

        return $pdf->stream('facture.pdf');
    }
}
