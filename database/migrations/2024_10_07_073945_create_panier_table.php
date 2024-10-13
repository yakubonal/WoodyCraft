<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'panier'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter les problèmes lors de la création de la table
        Schema::create('panier', function (Blueprint $table) { // Création de la table 'panier'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->string("session_id")->nullable(); // Colonne qui stocke l'id de session si le panier appartient à un invité
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });
    }

    /**
     * Exécute la migration pour supprimer la table 'panier'.
     */
    public function down(): void
    {
        Schema::dropIfExists('panier'); // Supprime la table 'panier' si elle existe
    }
};

