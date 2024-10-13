<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produit';

    public function articles()
    {
        return $this->hasMany(article_panier::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class); // Chaque produit appartient à une catégorie
    }
}
