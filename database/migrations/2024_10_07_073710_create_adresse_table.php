<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'adresse'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter les problèmes lors de la création de la table
        Schema::create('adresse', function (Blueprint $table) { // Création de la table 'adresse'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade'); // Création de la colonne 'user_id' qui fait référence à la table 'user' avec suppression en cascade
            $table->enum('type_adresse', ['livraison', 'facturation']); // Création de la colonne 'type_adresse' qui peut être soit 'livraison', soit 'facturation'
            $table->string('rue'); // Création de la colonne 'rue' pour stocker l'adresse
            $table->string('ville'); // Création de la colonne 'ville' pour stocker la ville
            $table->string('code_postal'); // Création de la colonne 'code_postal' pour stocker le code postal
            $table->string('pays'); // Création de la colonne 'pays' pour stocker le pays
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });
    }

    /**
     * Exécute la migration pour supprimer la table 'adresse'.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresse'); // Supprime la table 'adresse' si elle existe
    }
};

