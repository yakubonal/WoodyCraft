<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePanier extends Model
{
    use HasFactory;

    protected $table = 'article_panier';

    /**
     * Liste des attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'produit_id',
        'panier_id',
        'quantity',
    ];


    public function panier()
    {
        return $this->belongsTo(Panier::class, 'panier_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
