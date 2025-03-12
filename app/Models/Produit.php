<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produit';

    protected $fillable = [
        'prix',
        'stock',
    ];

    public function articles()
    {
        return $this->hasMany(ArticlePanier::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class); // Chaque produit appartient à une catégorie
    }
}
