<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Produit;

class ProduitTest extends TestCase
{
    use RefreshDatabase; // Réinitialise la base de données après chaque test

    /** @test */
    public function it_returns_404_if_product_not_found()
    {
        // Effectuer une requête GET vers un produit qui n'existe pas
        $response = $this->get(route('produit.show', 999));

        // Vérifier que la page retourne une erreur 404
        $response->assertStatus(404);
    }
}
