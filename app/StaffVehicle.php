<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffVehicle extends Model
{

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

    public function driver()
    {
        return $this->belongsTo(Staff::class,'driver_id');
    }
    public function person_veh(){

        return $this->hasOne(PersonalVehicle::class,'staff_vehicle_id');
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function services(){
        return $this->belongsToMany(Service::class,'vehicle_services');
    }
    public function vehicle_services(){
        return $this->hasMany(VehicleService::class);
    }

}
