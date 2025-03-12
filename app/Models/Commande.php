<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commande';

    protected $fillable = [
        'panier_id',
        'adresse_id',
        'date',
        'statut',
        'type_paiement',
        'montant_total',
    ];

    public function panier()
    {
        return $this->hasOne(Panier::class, 'panier_id');
    }

    public function adresse()
    {
        return $this->hasOne(Adresse::class, 'adresse_id');
    }
}
