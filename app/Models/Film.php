<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'tytul',
        'opis',
        'czas_trwania',
        'poster',
        'is_hot',
        'is_active',
        'kategoria_id',
    ];

    // Relacja jeden-do-jednej lub jeden-do-wielu
    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    // Nowa relacja wiele-do-wielu
    public function kategorie()
    {
        return $this->belongsToMany(Kategoria::class, 'film_kategoria');
    }

    public function seanse()
    {
        return $this->hasMany(Seanse::class);
    }

    public static function allMovies(){
        return self::with('kategoria')->where('is_active', true)->get();
    }

    public static function moviesCount(){
        return self::count();
    }
}

