<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'produit'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter les problèmes lors de la création de la table
        Schema::create('produit', function (Blueprint $table) { // Création de la table 'produit'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->string('nom'); // Création de la colonne 'nom' pour stocker le nom du produit
            $table->text('description'); // Création de la colonne 'description' pour stocker la description du produit
            $table->decimal('prix', 8, 2); // Création de la colonne 'prix' pour stocker le prix du produit (avec 8 chiffres au total, dont 2 après la virgule)
            $table->unsignedBigInteger('categorie_id'); // Création de la colonne 'Categorie_id' pour référencer la catégorie du produit
            $table->integer('stock'); // Création de la colonne 'stock' pour indiquer la quantité de produit en stock
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
            $table->foreign('categorie_id')->references('id')->on('categorie'); // Définition de la clé étrangère pour 'Categorie_id', référencée par la colonne 'id' de la table 'Categorie' avec suppression en cascade
        });
    }

    /**
     * Exécute la migration pour supprimer la table 'produit'.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit'); // Supprime la table 'produit' si elle existe
    }
};

