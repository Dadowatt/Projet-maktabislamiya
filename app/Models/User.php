<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'role',
    ];
    // Livres ajoutés en favoris
public function favoris()
{
    return $this->hasMany(Favoris::class);
}

// Livres notés par l'utilisateur
public function notes()
{
    return $this->hasMany(Note::class);
}

// Livres lus par l'utilisateur
public function lectures()
{
    return $this->hasMany(Lecture::class);
}

// Commentaires écrits par l'utilisateur
public function commentaire()
{
    return $this->hasMany(Commentaire::class);
}

// Auteurs suivis par cet utilisateur
public function auteurSuivis()
{
    return $this->belongsToMany(Auteur::class, 'auteur_suivis', 'user_id', 'auteur_id');
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
