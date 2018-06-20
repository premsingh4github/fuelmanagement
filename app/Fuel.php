<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_name');
    }
}
