<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Commande;
use App\Models\Panier;
use App\Http\Controllers\PanierController;
use App\Models\ArticlePanier;
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
        // Logique paiement par chèque à implémenter
        return redirect()->back()->with('success', 'Instructions pour le paiement par chèque...');
    }
}
