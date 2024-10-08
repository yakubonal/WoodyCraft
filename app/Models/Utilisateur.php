<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $table = 'user';

    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}
