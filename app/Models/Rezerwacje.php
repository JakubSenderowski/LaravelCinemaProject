<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Rezerwacje extends Model
{
    protected $fillable = [
        'user_id',
        'seans_id',
        'liczba_miejsc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seans()
    {
        return $this->belongsTo(Seanse::class);
    }

}
