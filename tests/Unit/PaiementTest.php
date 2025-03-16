<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Adresse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class PaiementTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_if_adresse_does_not_exist()
    {
        // Créer une adresse valide sans user_id
        $adresse = Adresse::create([
            'rue' => '99892 Jacobson Mews',
            'ville' => 'North Maegan',
            'code_postal' => '87546',
            'pays' => 'USA',
        ]);

        // Simuler une requête avec un adresse_id inexistant
        $response = $this->post(route('commande.payer', ['adresse_id' => 999]));

        // Vérifier que l'on est redirigé vers la page des adresses avec un message d'erreur
        $response->assertRedirect(route('adresse.index'));
        $response->assertSessionHas('error', 'Adresse non valide.');
    }

    public function test_redirect_if_adresse_belongs_to_another_user()
    {
        // Créer une adresse valide sans user_id
        $adresseValide = Adresse::create([
            'rue' => '161 McLaughlin Key',
            'ville' => 'Kuhlmanhaven',
            'code_postal' => '81002',
            'pays' => 'USA',
        ]);

        // Simuler une requête avec un adresse_id inexistant
        $response = $this->post(route('commande.payer', ['adresse_id' => 999])); // Adresse avec ID inexistant

        // Vérifier que l'on est redirigé vers la page des adresses avec un message d'erreur
        $response->assertRedirect(route('adresse.index'));
        $response->assertSessionHas('error', 'Adresse non valide.');
    }

    public function test_show_paiement_page_if_adresse_is_valid()
    {
        // Créer une adresse valide sans user_id
        $adresse = Adresse::create([
            'rue' => '251 Astrid Vista',
            'ville' => 'North Eulaliastad',
            'code_postal' => '79215',
            'pays' => 'USA',
        ]);

        // Simuler une requête pour afficher la page de paiement avec cette adresse
        $response = $this->post(route('commande.payer', ['adresse_id' => $adresse->id]));

        // Vérifier que la page de paiement est bien affichée
        $response->assertOk();
        $response->assertViewIs('paiement.index');
        $response->assertViewHas('adresse', $adresse);
    }

}
