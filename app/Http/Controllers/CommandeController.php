<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function payer(Request $request)
    {
        $adresse = Adresse::find($request->adresse_id);

        // Vérifier si l'adresse est valide
        if (!$adresse || $adresse->user_id !== auth()->id()) {
            return redirect()->route('adresses.index')->with('error', 'Adresse non valide.');
        }

        // Ici, tu gères le processus de paiement
        // Par exemple : redirection vers une passerelle de paiement ou une page de confirmation
        return view('paiement.index', compact('adresse'));
    }
}
