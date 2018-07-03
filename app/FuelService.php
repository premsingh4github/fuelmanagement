<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelService extends Model
{
    use SoftDeletes;
    protected $fillable = ['fuel_id','vehicle_service_id'];

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }
    public function vehicle_service(){
        return $this->belongsTo(VehicleService::class);
    }
}
