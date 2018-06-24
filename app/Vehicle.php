<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function previous_km()
    {
        if($this->staff_vehicles()->count() > 0){
            return $this->staff_vehicles()->first()->staff->previous_km();
        }
        else{
            return $this->current_km;
        }

    }

    public function staff_vehicles()
    {
        return $this->hasMany(StaffVehicle::class)->orderBy('id','DESC');
    }
}
