<?php

namespace App\Models;
use App\Models\Kategoria;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
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
