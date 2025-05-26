<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $fillable = [
        'nom',
        'photo'
    ];
    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
    public function auteurSuivis()
    {
        return $this->hasMany(AuteurSuivi::class);
    }
    public function followers()
{
    return $this->belongsToMany(User::class, 'auteur_suivis', 'auteur_id', 'user_id');
}
}
