<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie'; // Nom de la table
    protected $fillable = [
        'nom'
    ]; // Les champs que tu souhaites remplir

        
    public function produits()
    {
        return $this->hasMany(Produit::class); // Une catégorie a plusieurs produits
    }
}

