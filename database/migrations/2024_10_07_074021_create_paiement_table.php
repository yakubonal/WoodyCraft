<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration pour les migrations
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'paiement'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter des problèmes lors de la création de la table
        Schema::create('paiement', function (Blueprint $table) { // Création de la table 'paiement'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->foreignId('commande_id')->constrained('commande')->onDelete('cascade'); // Création de la colonne 'commande_id' comme clé étrangère vers la table 'commande'. Supprime le paiement si la commande associée est supprimée.
            $table->string('type'); // Création de la colonne 'type' pour stocker le type de paiement (ex: PayPal, carte de crédit, etc.)
            $table->string('statut'); // Création de la colonne 'statut' pour stocker le statut du paiement (ex: en attente, réussi, échoué, etc.)
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });        
    }

    /**
     * Exécute la migration pour supprimer la table 'paiement'.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement'); // Supprime la table 'paiement' si elle existe
    }
};
