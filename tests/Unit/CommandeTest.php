<?php

namespace Tests\Unit;

use App\Models\Adresse;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class CommandeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_adresses_index_if_adresse_does_not_exist()
    {
        // Création d'un utilisateur
        $user = User::factory()->create();

        // Simule l'authentification
        $this->actingAs($user);

        // Effectue une requête avec un adresse_id inexistant
        $response = $this->post(route('commande.payer'), ['adresse_id' => 999]);

        // Vérifie la redirection et le message d'erreur
        $response->assertRedirect(route('adresse.index'));
        $response->assertSessionHas('error', 'Adresse non valide.');
    }
}
