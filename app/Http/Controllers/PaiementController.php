<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Commande;
use App\Models\Panier;

class PaiementController extends Controller
{
    public function index(Adresse $adresse)
    {
        return view('paiement.index', compact('adresse'));
    }

    public function paypal(Request $request)
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

            // Si le panier n'existe pas, on redirige à la dernière page
            if ($panier === null) {
                return redirect()->back();
            }
        }

        // Ajouter le contenu du panier à la table "Commandes"
        Commande::create([
            'user' => $user,
            'panier' => $panier,
        ]);

        // Vider le panier de l'utilisateur
        // Logique PayPal à implémenter
        return redirect('https://www.paypal.com');
    }

    public function cheque(Request $request)
    {
        // Logique paiement par chèque à implémenter
        return redirect()->back()->with('success', 'Instructions pour le paiement par chèque...');
    }
}
