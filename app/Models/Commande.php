<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commande';

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function adresseLivraison()
    {
        return $this->belongsTo(Adresse::class, 'adresse_livraison_id');
    }

    public function adresseFacturation()
    {
        return $this->belongsTo(Adresse::class, 'adresse_facturation_id');
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }
}
