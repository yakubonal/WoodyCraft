<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration pour les migrations
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'article_panier'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter des problèmes lors de la création de la table
        Schema::create('articlePanier', function (Blueprint $table) { // Création de la table 'article_panier'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->foreignId('panier_id')->constrained('panier')->onDelete('cascade'); // Création de la colonne 'panier_id' comme clé étrangère vers la table 'panier'. Supprime les articles si le panier associé est supprimé.
            $table->foreignId('produit_id')->constrained('produit')->onDelete('cascade'); // Création de la colonne 'produit_id' comme clé étrangère vers la table 'produit'. Supprime l'article si le produit associé est supprimé.
            $table->integer('quantité'); // Création de la colonne 'quantité' pour stocker la quantité de chaque produit dans le panier
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });
    }

    /**
     * Exécute la migration pour supprimer la table 'article_panier'.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_panier'); // Supprime la table 'article_panier' si elle existe
    }
};

