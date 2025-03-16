<?php

namespace Tests\Feature;

use App\Models\ArticlePanier;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Http\Controllers\PanierController;

class PanierTest extends TestCase
{
    use RefreshDatabase; // Réinitialiser la base de données après chaque test

    /**
     * Teste l'affichage du panier (méthode index)
     */
    public function test_index_with_empty_panier()
    {
        // Créer un panier sans produits
        $panier = Panier::create(['session_id' => 'session-id']);

        // Effectuer une requête GET pour afficher le panier
        $response = $this->get('/panier');

        // Vérifier que le panier est vide et afficher un message approprié
        $response->assertViewIs('produits.panier');
        $response->assertViewHas('message', 'Votre panier est vide.');
    }
}
