<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = [
        'nazwa',
        'liczba_miejsc',
        'is_active',
    ];

    public function seanse()
    {
        return $this->hasMany(Seanse::class);
    }

}
