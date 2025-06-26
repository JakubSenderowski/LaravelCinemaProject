<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $fillable = [
        'nazwa',
        'is_active',
    ];

    // Stara relacja 1:N`
    public function films()
    {
        return $this->hasMany(Film::class);
    }

    // Nowa relacja N:N
    public function filmyWielokrotne()
    {
        return $this->belongsToMany(Film::class, 'film_kategoria');
    }
}

