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
            return redirect()->route('adresse.index')->with('error', 'Adresse non valide.');
        }

        return view('paiement.index', compact('adresse'));
    }


}
