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
    public static function hotMovies($limit = 3)
    {
        return self::with('kategoria')
            ->where('is_hot', true)
            ->take($limit)
            ->get();
    }

}
