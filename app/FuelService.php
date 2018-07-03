<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelService extends Model
{
    use SoftDeletes;

    public function fuel()
    {
        return $this->belongsTo(Fuel::class,'fuel_id');
    }
    public function vehicle_service(){
        return $this->belongsTo(VehicleService::class);
    }
}
