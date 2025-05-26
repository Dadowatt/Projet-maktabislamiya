<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'livre_id',
        'user_id',
    ];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
