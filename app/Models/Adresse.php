<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table = 'adresses';

    protected $fillable = [
        'rue',
        'ville',
        'code_postal',
        'pays',
    ];

}
