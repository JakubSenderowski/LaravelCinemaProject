<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seanse extends Model
{
    protected $table = 'seanses';

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
    public function rezerwacje()
    {
        return $this->hasMany(Rezerwacje::class);
    }

}
