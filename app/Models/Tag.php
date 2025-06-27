<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nazwa', 'is_active'];

    public function filmy()
    {
        return $this->belongsToMany(Film::class, 'film_tag');
    }
}
