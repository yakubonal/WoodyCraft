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
        $adresseExistante = null;

        if (!is_null($user) && !is_null($user->adresse_id)) {
            $adresseExistante = Adresse::findOrFail($user->adresse_id);
        }

        return view('adresse/formulaire-adresse', compact('adresseExistante'));
    }

    public function store(Request $request)
    {
        // Si l'utilisateur utilise son adresse existante
        if ($request->has('utiliser_adresse_existante') && auth()->user()->adresse_id) {
            return redirect()->route('paiement.index', ['adresse' => auth()->user()->adresse_id]);
        }

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

        if ($request->has('enregistrer_adresse')) {
            $user = User::findOrFail(auth()->id());
            $user->adresse_id = $adresse->id;
            $user->save();
        }

        // On associe l'adresse au panier si l'utilisateur n'a pas de compte
        $panier = PanierController::get_panier($request);
        $panier->adresse_id = $adresse->id;
        $panier->save();

        return redirect()->route('paiement.index', ['adresse' => $adresse->id]);
    }
}
