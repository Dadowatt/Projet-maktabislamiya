<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $fillable = [
        'titre_livre',
        'nom_auteur',
        'user_name',
        'email',
        'details'
    ];
}
