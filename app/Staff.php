<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    public function designation()
    {
       return $this->belongsTo(Designation::class,'designation_id');

    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class,'staff_vehicles')->orderBy('id','DESC');
    }

    public function staff_vehicles()
    {
        return $this->hasMany(StaffVehicle::class)->orderBy('id','DESC');
    }

    public function fuels()
    {
        return $this->hasMany(Fuel::class);
    }
    public function previous_km()
    {
        if($this->staff_vehicles()->count() > 0){
            if($this->fuels()->count() > 0){
                return $this->fuels()->orderBy('id','DESC')->first()->current_km;
            }
            else{
                return $this->staff_vehicles()->vehicle->current_km;
            }

        }
        else{
            return 0;
        }

    }

}
