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
        Schema::create('article_commande', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained('commande')->onDelete('cascade');
            $table->foreignId('produit_id')->constrained('produit')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_commande');
    }
};
