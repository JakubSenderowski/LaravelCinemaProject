<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Rezerwacje extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seans()
    {
        return $this->belongsTo(Seanse::class);
    }

}
