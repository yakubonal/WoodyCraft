<?php

use Illuminate\Database\Migrations\Migration; // Importation de la classe Migration pour les migrations
use Illuminate\Database\Schema\Blueprint; // Importation de la classe Blueprint pour définir la structure de la table
use Illuminate\Support\Facades\Schema; // Importation de la façade Schema pour manipuler les tables

return new class extends Migration // Début de la définition de la migration
{
    /**
     * Exécute la migration pour créer la table 'commande'.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); // Désactive les contraintes de clé étrangère pour éviter des problèmes lors de la création de la table
        Schema::create('commande', function (Blueprint $table) { // Création de la table 'commande'
            $table->id(); // Création de la colonne 'id' (clé primaire, auto-increment)
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade'); // Création de la colonne 'user_id' comme clé étrangère vers la table 'user'. Supprime la commande si l'user est supprimé.
            $table->foreignId('panier_id')->constrained('panier')->onDelete('cascade'); // Création de la colonne 'panier_id' comme clé étrangère vers la table 'panier'. Supprime la commande si le panier est supprimé.
            $table->foreignId('adresse_livraison_id')->constrained('adresse')->onDelete('cascade'); // Création de la colonne 'adresse_livraison_id' comme clé étrangère vers la table 'adresse'. Supprime la commande si l'adresse de livraison est supprimée.
            $table->foreignId('adresse_facturation_id')->constrained('adresse')->onDelete('cascade'); // Création de la colonne 'adresse_facturation_id' comme clé étrangère vers la table 'adresse'. Supprime la commande si l'adresse de facturation est supprimée.
            $table->dateTime('date'); // Création de la colonne 'date' pour stocker la date et l'heure de la commande
            $table->string('statut'); // Création de la colonne 'statut' pour stocker le statut de la commande (ex: en traitement, expédiée, livrée, etc.)
            $table->decimal('montant_total', 8, 2); // Création de la colonne 'montant_total' pour stocker le montant total de la commande
            $table->timestamps(); // Création des colonnes 'created_at' et 'updated_at' pour gérer les timestamps
        });        
    }

    /**
     * Exécute la migration pour supprimer la table 'commande'.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande'); // Supprime la table 'commande' si elle existe
    }
};

