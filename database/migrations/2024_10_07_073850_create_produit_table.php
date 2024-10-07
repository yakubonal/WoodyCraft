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
        Schema::create('produit', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom');
            $table->text('description');
            $table->decimal('prix', 8, 2);
            $table->unsignedBigInteger('categorie_id'); 
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categorie')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
