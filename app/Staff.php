<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    public function designation()
    {
       return $this->belongsTo(Designation::class,'designation_id');

    }
}
