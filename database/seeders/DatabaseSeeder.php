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

        // $adresse = \App\Models\Adresse::create([
        //     'rue' => '123 Rue de la Liberté',
        //     'ville' => 'Paris',
        //     'code_postal' => '75001',
        //     'pays' => 'France',
        // ]);

        // Création de l'utilisateur avec l'ID de l'adresse
        \App\Models\User::factory()->create([
            'name' => "Sarah",
            'email' => "sarah75@gmail.com",
            'password' => Hash::make("sarah75"),
            'is_admin' => 0,
            // 'adresse_id' => $adresse->id,
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

        // Ordre mélangé de création des produits
        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Éléphant',
            'description' => 'Un puzzle détaillé d\'un éléphant en bois.',
            'prix' => 34.99,
            'categorie_id' => 1,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Gratte-ciel Moderne',
            'description' => 'Puzzle 3D d\'un gratte-ciel moderne avec des détails architecturaux.',
            'prix' => 44.99,
            'categorie_id' => 2,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Dragon',
            'description' => 'Un dragon fantastique à assembler en puzzle 3D.',
            'prix' => 45.99,
            'categorie_id' => 3,
            'stock' => 12
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Tour Eiffel',
            'description' => 'Recréez la célèbre Tour Eiffel en puzzle 3D.',
            'prix' => 39.99,
            'categorie_id' => 4,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Piano',
            'description' => 'Un piano miniature à assembler en puzzle 3D.',
            'prix' => 34.99,
            'categorie_id' => 5,
            'stock' => 40
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Arbre',
            'description' => 'Un bel arbre à monter avec ce puzzle 3D.',
            'prix' => 27.99,
            'categorie_id' => 6,
            'stock' => 30
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Voiture de Course',
            'description' => 'Un modèle 3D détaillé d\'une voiture de course.',
            'prix' => 39.99,
            'categorie_id' => 7,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Lion',
            'description' => 'Un puzzle 3D réaliste d\'un lion en bois.',
            'prix' => 29.99,
            'categorie_id' => 1,
            'stock' => 50
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Maison Victorienne',
            'description' => 'Modèle 3D d\'une maison victorienne à monter.',
            'prix' => 39.99,
            'categorie_id' => 2,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Château Enchanté',
            'description' => 'Un château de conte de fées en puzzle 3D.',
            'prix' => 49.99,
            'categorie_id' => 3,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Statue de la Liberté',
            'description' => 'Un puzzle 3D de la Statue de la Liberté.',
            'prix' => 42.99,
            'categorie_id' => 4,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Guitare',
            'description' => 'Un puzzle 3D d\'une guitare classique.',
            'prix' => 29.99,
            'categorie_id' => 5,
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
            'nom' => 'Puzzle 3D Avion de Chasse',
            'description' => 'Avion de chasse en puzzle 3D à assembler.',
            'prix' => 49.99,
            'categorie_id' => 7,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Tigre',
            'description' => 'Recréez un tigre en 3D avec ce puzzle.',
            'prix' => 27.99,
            'categorie_id' => 1,
            'stock' => 45
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Villa Méditerranéenne',
            'description' => 'Villa méditerranéenne en 3D à assembler.',
            'prix' => 35.99,
            'categorie_id' => 2,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Phénix',
            'description' => 'Un puzzle 3D du mythique Phénix en bois.',
            'prix' => 39.99,
            'categorie_id' => 3,
            'stock' => 8
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Big Ben',
            'description' => 'Assemblez la célèbre horloge Big Ben en 3D.',
            'prix' => 38.99,
            'categorie_id' => 4,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Batterie',
            'description' => 'Un puzzle 3D représentant une batterie musicale.',
            'prix' => 32.99,
            'categorie_id' => 5,
            'stock' => 22
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Arbre Sombre',
            'description' => 'Un arbre mystérieux à assembler en puzzle 3D.',
            'prix' => 27.99,
            'categorie_id' => 6,
            'stock' => 12
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Bateau Pirate',
            'description' => 'Un puzzle 3D complexe d\'un bateau pirate.',
            'prix' => 54.99,
            'categorie_id' => 7,
            'stock' => 8
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Rhinocéros',
            'description' => 'Un rhinocéros à assembler en puzzle 3D.',
            'prix' => 33.99,
            'categorie_id' => 1,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Temple Grec',
            'description' => 'Recréez un temple grec avec ce puzzle 3D.',
            'prix' => 49.99,
            'categorie_id' => 2,
            'stock' => 12
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Sorcier Mystique',
            'description' => 'Un puzzle 3D représentant un sorcier mystique.',
            'prix' => 42.99,
            'categorie_id' => 3,
            'stock' => 9
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Colisée Romain',
            'description' => 'Un modèle 3D du Colisée romain à assembler.',
            'prix' => 41.99,
            'categorie_id' => 4,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Violon',
            'description' => 'Un magnifique violon miniature en puzzle 3D.',
            'prix' => 35.99,
            'categorie_id' => 5,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Cascade',
            'description' => 'Une cascade naturelle à monter en puzzle 3D.',
            'prix' => 28.99,
            'categorie_id' => 6,
            'stock' => 15
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Train à Vapeur',
            'description' => 'Un modèle détaillé d\'un train à vapeur en 3D.',
            'prix' => 48.99,
            'categorie_id' => 7,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Girafe',
            'description' => 'Un puzzle 3D représentant une girafe en bois.',
            'prix' => 31.99,
            'categorie_id' => 1,
            'stock' => 35
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Cathédrale Gothique',
            'description' => 'Un puzzle 3D d\'une cathédrale gothique détaillée.',
            'prix' => 52.99,
            'categorie_id' => 2,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Phare Enchanté',
            'description' => 'Un phare mystique à assembler en puzzle 3D.',
            'prix' => 46.99,
            'categorie_id' => 3,
            'stock' => 8
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Pont de Brooklyn',
            'description' => 'Le pont de Brooklyn à monter en puzzle 3D.',
            'prix' => 44.99,
            'categorie_id' => 4,
            'stock' => 17
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Saxophone',
            'description' => 'Un saxophone miniature à assembler en 3D.',
            'prix' => 32.99,
            'categorie_id' => 5,
            'stock' => 28
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Forêt Tropicale',
            'description' => 'Un puzzle 3D représentant une forêt tropicale.',
            'prix' => 30.99,
            'categorie_id' => 6,
            'stock' => 20
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Hélicoptère Militaire',
            'description' => 'Un hélicoptère militaire en puzzle 3D.',
            'prix' => 49.99,
            'categorie_id' => 7,
            'stock' => 7
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Zèbre',
            'description' => 'Un puzzle 3D du zèbre en bois.',
            'prix' => 34.99,
            'categorie_id' => 1,
            'stock' => 25
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Palais Royal',
            'description' => 'Recréez un palais royal avec ce puzzle 3D.',
            'prix' => 55.99,
            'categorie_id' => 2,
            'stock' => 10
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Licorne',
            'description' => 'Une licorne enchantée en puzzle 3D.',
            'prix' => 47.99,
            'categorie_id' => 3,
            'stock' => 9
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Kremlin',
            'description' => 'Le Kremlin russe en puzzle 3D détaillé.',
            'prix' => 50.99,
            'categorie_id' => 4,
            'stock' => 8
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Clarinette',
            'description' => 'Un modèle 3D d\'une clarinette à assembler.',
            'prix' => 31.99,
            'categorie_id' => 5,
            'stock' => 22
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Montagne Neigeuse',
            'description' => 'Un paysage montagneux enneigé en 3D.',
            'prix' => 29.99,
            'categorie_id' => 6,
            'stock' => 18
        ]);

        \App\Models\Produit::create([
            'nom' => 'Puzzle 3D Voiture Classique',
            'description' => 'Un puzzle 3D d\'une voiture classique ancienne.',
            'prix' => 43.99,
            'categorie_id' => 7,
            'stock' => 13
        ]);

    }
}
