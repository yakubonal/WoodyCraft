<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commande';

    protected $fillable = [
        'adresse_id',
        'user_id',
        'date',
        'statut',
        'type_paiement',
        'montant_total',
    ];

    public function adresse()
    {
        return $this->hasOne(Adresse::class, 'adresse_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
