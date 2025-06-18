<?php

namespace App\Models;
use App\Models\Film;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    public function films(){
        return $this->hasMany(\App\Models\Film::class);
    }
}
