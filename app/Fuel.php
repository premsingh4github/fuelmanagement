<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function fuel_services()
    {
        return $this->hasMany(FuelService::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Staff::class,'receiver_id');
    }

    public function petrolpump()
    {
        return $this->belongsTo(Petrolpump::class,'petrolpump_id');

    }
}
