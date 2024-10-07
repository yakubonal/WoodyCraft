<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table = 'adresse';

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
