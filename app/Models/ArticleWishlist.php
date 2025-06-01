<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleWishlist extends Model
{
    use HasFactory;

    protected $table = 'article_wishlist';

    /**
     * Liste des attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'produit_id',
        'wishlist_id',
        'quantity',
    ];


    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'wishlist_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
