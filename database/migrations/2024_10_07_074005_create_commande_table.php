<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->foreignId('panier_id')->constrained('panier')->onDelete('cascade');
            $table->foreignId('adresse_livraison_id')->constrained('adresse')->onDelete('cascade');
            $table->foreignId('adresse_facturation_id')->constrained('adresse')->onDelete('cascade');
            $table->dateTime('date');
            $table->string('statut');
            $table->decimal('montant_total', 8, 2);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
