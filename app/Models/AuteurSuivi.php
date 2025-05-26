<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuteurSuivi extends Model
{
    protected $fillable = [
        'user_id',
        'auteur_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
}
