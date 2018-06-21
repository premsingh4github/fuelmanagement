<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function staffVehicle()
    {
        return $this->belongsTo(StaffVehicle::class);
    }

}
