<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\User;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $adresse = [];

        if ((! is_null($user)) && (! is_null($user->adresse_id))) {
            $adresse = Adresse::findOrFail($user->adresse_id);
        }

        return view('adresse/formulaire-adresse', compact('adresse'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rue' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
            'pays' => 'required',
        ]);

        $adresse = Adresse::create([
            'rue' => $request->rue,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'pays' => $request->pays,
        ]);

        // Si la case "Enregistrer mon adresse" a été cochée, on associe l'adresse à l'utilisateur
        if ($request->has('enregistrer_adresse')) {
            $user = User::findOrFail(auth()->id());
            $user->adresse_id = $adresse->id;
            $user->save();
        }

        return redirect()->route('adresse.index')->with('success', 'Adresse ajoutée avec succès.');
    }
}
