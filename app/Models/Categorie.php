<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom'];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'categorie_user');
    }

}
