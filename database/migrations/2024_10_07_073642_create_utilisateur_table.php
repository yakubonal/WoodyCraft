<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'utilisateur'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter les problèmes lors de la création de la table
        Schema::create('utilisateur', function (Blueprint $table) { // Création de la table 'utilisateur'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->string('nom'); // Création de la colonne 'nom' pour stocker le nom de l'utilisateur
            $table->string('email')->unique(); // Création de la colonne 'email' avec une contrainte d'unicité
            $table->string('mot_de_passe'); // Création de la colonne 'mot_de_passe' pour stocker le mot de passe de l'utilisateur
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });        
    }

    /**
     * Exécute la migration pour supprimer la table 'utilisateur'.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur'); // Supprime la table 'utilisateur' si elle existe
    }
};
