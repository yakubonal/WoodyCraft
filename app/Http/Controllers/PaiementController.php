<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;

class PaiementController extends Controller
{
    public function index(Adresse $adresse)
    {
        return view('paiement.index', compact('adresse'));
    }

    public function paypal(Request $request)
    {
        // Logique PayPal à implémenter
        return redirect('https://www.paypal.com');
    }

    public function cheque(Request $request)
    {
        // Logique paiement par chèque à implémenter
        return redirect()->back()->with('success', 'Instructions pour le paiement par chèque...');
    }
}
