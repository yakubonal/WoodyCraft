<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = 'panier';

    /**
     * Liste des attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'session_id',
        'adresse_id',
    ];
}
