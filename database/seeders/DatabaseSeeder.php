<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un user par défaut
        \App\Models\User::factory()->create([
            'name' => "Yakub",
            'email' => "a@a.a",
            'password' => Hash::make("azer"),
        ]);

        // Création des catégories par défaut
        \App\Models\Categorie::create([
            'nom' => "Animaux",
            'description' => "Puzzles 3D représentant divers animaux, réalistes ou stylisés.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Architecture",
            'description' => "Puzzles de structures architecturales emblématiques et designs modernes.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Fantasy",
            'description' => "Puzzles 3D basés sur des thèmes fantastiques, tels que des dragons, châteaux et personnages de contes.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Monuments",
            'description' => "Reproductions en 3D de célèbres monuments et bâtiments historiques.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Music",
            'description' => "Puzzles 3D représentant des instruments de musique et des scènes musicales.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Nature",
            'description' => "Puzzles inspirés par la nature, comme des paysages, des plantes et des formations géologiques.",
        ]);

        \App\Models\Categorie::create([
            'nom' => "Véhicules",
            'description' => "Modèles de voitures, avions, bateaux et autres moyens de transport en 3D.",
        ]);

        // Création de plusieurs produits
        // Catégorie : Animaux
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Lion',
            'description' => 'Un puzzle 3D réaliste d\'un lion en bois.',
            'prix' => 29.99,
            'categorie_id' => 1,
            'stock' => 50
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Oiseau Exotique',
            'description' => 'Représentation d\'un oiseau exotique en puzzle 3D.',
            'prix' => 24.99,
            'categorie_id' => 1,
            'stock' => 40
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Éléphant',
            'description' => 'Un puzzle détaillé d\'un éléphant en bois.',
            'prix' => 34.99,
            'categorie_id' => 1,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Dauphin',
            'description' => 'Un dauphin en 3D découpé au laser.',
            'prix' => 22.99,
            'categorie_id' => 1,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Tigre',
            'description' => 'Recréez un tigre en 3D avec ce puzzle.',
            'prix' => 27.99,
            'categorie_id' => 1,
            'stock' => 45
        ]);

        // Catégorie : Architecture
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Maison Victorienne',
            'description' => 'Modèle 3D d\'une maison victorienne à monter.',
            'prix' => 39.99,
            'categorie_id' => 2,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Gratte-ciel Moderne',
            'description' => 'Puzzle 3D d\'un gratte-ciel moderne avec des détails architecturaux.',
            'prix' => 44.99,
            'categorie_id' => 2,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Villa Méditerranéenne',
            'description' => 'Villa méditerranéenne en 3D à assembler.',
            'prix' => 35.99,
            'categorie_id' => 2,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Pagode Asiatique',
            'description' => 'Un puzzle 3D représentant une pagode traditionnelle asiatique.',
            'prix' => 32.99,
            'categorie_id' => 2,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Cottage Anglais',
            'description' => 'Un charmant cottage anglais à monter en 3D.',
            'prix' => 28.99,
            'categorie_id' => 2,
            'stock' => 40
        ]);

        // Catégorie : Fantasy
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Dragon',
            'description' => 'Un dragon fantastique à assembler en puzzle 3D.',
            'prix' => 45.99,
            'categorie_id' => 3,
            'stock' => 12
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Château Enchanté',
            'description' => 'Un château de conte de fées en puzzle 3D.',
            'prix' => 49.99,
            'categorie_id' => 3,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Phénix',
            'description' => 'Un puzzle 3D du mythique Phénix en bois.',
            'prix' => 39.99,
            'categorie_id' => 3,
            'stock' => 8
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Licorne',
            'description' => 'Licorne mystique à monter avec des pièces en bois.',
            'prix' => 29.99,
            'categorie_id' => 3,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Sorcier',
            'description' => 'Un puzzle 3D représentant un puissant sorcier.',
            'prix' => 34.99,
            'categorie_id' => 3,
            'stock' => 20
        ]);

        // Catégorie : Monuments
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Tour Eiffel',
            'description' => 'Recréez la célèbre Tour Eiffel en puzzle 3D.',
            'prix' => 39.99,
            'categorie_id' => 4,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Statue de la Liberté',
            'description' => 'Un puzzle 3D de la Statue de la Liberté.',
            'prix' => 42.99,
            'categorie_id' => 4,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Colisée de Rome',
            'description' => 'Reproduction en 3D du Colisée de Rome.',
            'prix' => 37.99,
            'categorie_id' => 4,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Big Ben',
            'description' => 'Le Big Ben en puzzle 3D pour les amateurs d\'histoire.',
            'prix' => 35.99,
            'categorie_id' => 4,
            'stock' => 22
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Taj Mahal',
            'description' => 'Puzzle 3D représentant le célèbre Taj Mahal.',
            'prix' => 49.99,
            'categorie_id' => 4,
            'stock' => 12
        ]);

        // Catégorie : Music
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Piano',
            'description' => 'Un piano miniature à assembler en puzzle 3D.',
            'prix' => 34.99,
            'categorie_id' => 5,
            'stock' => 40
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Guitare',
            'description' => 'Un puzzle 3D d\'une guitare classique.',
            'prix' => 29.99,
            'categorie_id' => 5,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Batterie',
            'description' => 'Recréez une batterie complète en 3D.',
            'prix' => 44.99,
            'categorie_id' => 5,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Saxophone',
            'description' => 'Saxophone détaillé à assembler en puzzle 3D.',
            'prix' => 39.99,
            'categorie_id' => 5,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Violon',
            'description' => 'Violon classique à monter avec des pièces en bois.',
            'prix' => 32.99,
            'categorie_id' => 5,
            'stock' => 22
        ]);

        // Catégorie : Nature
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Arbre',
            'description' => 'Un bel arbre à monter avec ce puzzle 3D.',
            'prix' => 27.99,
            'categorie_id' => 6,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Montagne',
            'description' => 'Représentation d\'une chaîne de montagnes en 3D.',
            'prix' => 31.99,
            'categorie_id' => 6,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Fleurs Exotiques',
            'description' => 'Un ensemble de fleurs exotiques en puzzle 3D.',
            'prix' => 22.99,
            'categorie_id' => 6,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Paysage Forestier',
            'description' => 'Un puzzle 3D représentant un paysage forestier.',
            'prix' => 34.99,
            'categorie_id' => 6,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Cascade',
            'description' => 'Représentez une cascade en 3D avec ce puzzle.',
            'prix' => 29.99,
            'categorie_id' => 6,
            'stock' => 28
        ]);

        // Catégorie : Véhicules
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Voiture de Course',
            'description' => 'Un modèle 3D détaillé d\'une voiture de course.',
            'prix' => 39.99,
            'categorie_id' => 7,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Avion de Chasse',
            'description' => 'Avion de chasse en puzzle 3D à assembler.',
            'prix' => 49.99,
            'categorie_id' => 7,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Bateau Pirate',
            'description' => 'Représentez un navire pirate en 3D avec ce puzzle.',
            'prix' => 45.99,
            'categorie_id' => 7,
            'stock' => 12
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Moto Vintage',
            'description' => 'Une moto vintage à assembler en puzzle 3D.',
            'prix' => 34.99,
            'categorie_id' => 7,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Train à Vapeur',
            'description' => 'Modèle de train à vapeur en 3D à assembler.',
            'prix' => 37.99,
            'categorie_id' => 7,
            'stock' => 18
        ]);

 

    }
}
