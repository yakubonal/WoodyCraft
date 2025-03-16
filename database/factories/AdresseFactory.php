<?php

namespace Database\Factories;

use App\Models\Adresse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseFactory extends Factory
{
    /**
     * Le nom du modèle que cette factory correspond.
     *
     * @var string
     */
    protected $model = Adresse::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Associe un utilisateur à cette adresse
            'adresse' => $this->faker->address(), // Utilise Faker pour générer une adresse
            'ville' => $this->faker->city(), // Utilise Faker pour générer une ville
            'code_postal' => $this->faker->postcode(), // Utilise Faker pour générer un code postal
        ];
    }
}
