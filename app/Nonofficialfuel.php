<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nonofficialfuel extends Model
{
    public function petrolpump()
    {
        return $this->belongsTo(Petrolpump::class);
    }
}
