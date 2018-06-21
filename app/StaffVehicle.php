<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffVehicle extends Model
{

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
//        return $this->belongsTo(Designation::class,'designation_id');

    }

    public function driver()
    {
        return $this->belongsTo(Staff::class,'driver_id');
    }
    public function Person_veh(){

        return $this->hasOne(PersonalVehicle::class,'staff_vehicle_id');
    }

}
