<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'image_couverture',
        'pdf_url',
        'auteur_id',
        'categorie_id',
    ];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
   public function categorie() {
    return $this->belongsTo(Categorie::class);
}

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function lecteurs()
    {
        return $this->belongsToMany(User::class, 'lectures');
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
