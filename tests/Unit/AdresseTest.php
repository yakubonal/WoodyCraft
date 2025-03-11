<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Adresse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdresseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_address_and_links_to_user()
    {
        // Créez un utilisateur fictif
        $user = User::factory()->create();

        // Connectez l'utilisateur
        $this->actingAs($user);

        // Données de création d'adresse
        $adresseData = [
            'rue' => '123 Rue de Test',
            'ville' => 'Paris',
            'code_postal' => '75001',
            'pays' => 'France',
            'enregistrer_adresse' => true,
        ];

        // Simulez la requête POST pour créer l'adresse
        $response = $this->post(route('adresse.store'), $adresseData);

        // Vérifiez que l'adresse a bien été créée
        $this->assertDatabaseHas('adresses', [
            'rue' => $adresseData['rue'],
            'ville' => $adresseData['ville'],
            'code_postal' => $adresseData['code_postal'],
            'pays' => $adresseData['pays'],
        ]);

        // Vérifiez que l'utilisateur a bien son adresse associée
        $user->refresh();
        $this->assertNotNull($user->adresse_id);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'adresse_id' => $user->adresse_id,
        ]);

        // Vérifiez la redirection
        $response->assertRedirect(route('paiement.index', ['adresse' => $user->adresse_id]));
    }

    /** @test */
    public function it_fails_to_create_address_with_invalid_data()
    {
        // Créez un utilisateur fictif
        $user = User::factory()->create();
        
        // Connectez l'utilisateur
        $this->actingAs($user);
        
        // Données invalides
        $invalidData = [
            'rue' => '',
            'ville' => '',
            'code_postal' => '',
            'pays' => '',
        ];
        
        // Simulez la requête POST avec des données invalides
        $response = $this->post(route('adresse.store'), $invalidData);
        
        // Vérifiez que la validation échoue et renvoie des erreurs
        $response->assertSessionHasErrors(['rue', 'ville', 'code_postal', 'pays']);
        
        // Vérifiez qu'aucune adresse n'a été ajoutée
        $this->assertDatabaseMissing('adresses', [
            'rue' => $invalidData['rue'],
            'ville' => $invalidData['ville'],
            'code_postal' => $invalidData['code_postal'],
            'pays' => $invalidData['pays'],
        ]);
    }
}
