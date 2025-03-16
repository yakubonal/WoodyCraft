<?php

namespace Tests\Feature;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategorieTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Désactiver la compilation Vite en modifiant la configuration asset_url
        config()->set('app.asset_url', '/');
        config()->set('vite.enabled', false);
    }

    /**
     * Test la méthode index qui affiche toutes les catégories.
     *
     * @return void
     */
    public function test_it_displays_all_categories(): void
    {
        // Créer deux catégories manuellement
        $categorie1 = new Categorie();
        $categorie1->nom = 'Puzzles';
        $categorie1->description = 'Une catégorie dédiée aux puzzles.';
        $categorie1->save();

        $categorie2 = new Categorie();
        $categorie2->nom = 'Jeux de société';
        $categorie2->description = 'Des jeux de société pour tous les âges.';
        $categorie2->save();

        // Effectuer une requête GET pour afficher la page d'accueil
        $response = $this->get('/'); // Selon votre route d'accueil

        // Vérifier que la réponse est correcte (200 OK)
        $response->assertStatus(200);

        // Vérifier que les données des catégories sont présentes dans la vue
        $response->assertSee($categorie1->nom);
        $response->assertSee($categorie2->nom);
    }

    /**
     * Test la méthode show qui affiche les produits d'une catégorie.
     *
     * @return void
     */
    public function test_it_displays_products_by_category(): void
    {
        // Créer une catégorie manuellement
        $categorie = new Categorie();
        $categorie->nom = 'Puzzles';
        $categorie->description = 'Une catégorie dédiée aux puzzles.';
        $categorie->save();

        // Créer des produits associés à cette catégorie
        $produit1 = new Produit();
        $produit1->nom = 'Puzzle 1000 pièces';
        $produit1->description = 'Un magnifique puzzle de paysage';
        $produit1->prix = 19.99;
        $produit1->stock = 10; // Ajout du champ stock qui est requis
        $produit1->categorie_id = $categorie->id;
        $produit1->save();

        $produit2 = new Produit();
        $produit2->nom = 'Puzzle 500 pièces';
        $produit2->description = 'Un petit puzzle pour débutants';
        $produit2->prix = 12.99;
        $produit2->stock = 5; // Ajout du champ stock qui est requis
        $produit2->categorie_id = $categorie->id;
        $produit2->save();

        // Effectuer une requête GET pour afficher les produits de cette catégorie
        // Utilisez la route exacte selon votre définition de route
        $response = $this->get('/categorie/' . $categorie->id); // Note: j'ai changé categories -> categorie (singulier)

        // Vérifier que la réponse est correcte (200 OK)
        $response->assertStatus(200);

        // Vérifier que les données de la catégorie et des produits sont présentes dans la vue
        $response->assertSee($categorie->nom);
        $response->assertSee($produit1->nom);
        $response->assertSee($produit2->nom);
    }

    /**
     * Test la méthode show lorsqu'aucun produit n'est disponible pour une catégorie.
     *
     * @return void
     */
    public function test_it_handles_empty_products_in_category(): void
    {
        // Créer une catégorie sans produits
        $categorie = new Categorie();
        $categorie->nom = 'Catégorie vide';
        $categorie->description = 'Une catégorie sans produits.';
        $categorie->save();

        // Effectuer une requête GET pour afficher les produits de cette catégorie
        // Utilisez la route exacte selon votre définition de route
        $response = $this->get('/categorie/' . $categorie->id); // Note: j'ai changé categories -> categorie (singulier)

        // Vérifier que la réponse est correcte (200 OK)
        $response->assertStatus(200);

        // Vérifier que la vue est correctement chargée avec la catégorie
        $response->assertSee($categorie->nom);

        // Vérifier que la vue est correctement chargée
        $response->assertViewIs('produits.produitsParCategorie');
        $response->assertViewHas('produits');
        $response->assertViewHas('categorie');
    }
}
