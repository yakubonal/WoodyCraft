<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = 'panier';

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function articles()
    {
        return $this->hasMany(ArticlePanier::class);
    }
}
