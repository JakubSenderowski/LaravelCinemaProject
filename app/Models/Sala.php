<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    public function seanse()
    {
        return $this->hasMany(Seanse::class);
    }

}
