<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'panier_id',
        'adresse_id',
        'password',
        'is_admin',
    ];

    // Ajout de la méthode pour vérifier si l'utilisateur est admin
    public function isAdmin()
    {
        return $this->is_admin == true; // Notez le double égal au lieu du triple
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relation avec Panier.
     * Un utilisateur appartient à un panier.
     */
    public function panier()
    {
        return $this->belongsTo(Panier::class, 'panier_id');
    }

    /**
     * Relation avec Adresse.
     * Un utilisateur appartient à un adresse.
     */
    public function adresse()
    {
        return $this->hasOne(Adresse::class, 'adresse_id');
    }
}
