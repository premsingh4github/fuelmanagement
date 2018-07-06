<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;
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

    public function current_fuel($service_id)
    {
        $quantity = 0;
        if($vehicle_fuel_old = VehicleFuel::select('quantity')->where('service_id',$service_id)->where('vehicle_id',$this->id)->orderBy('id','DESC')->first()){
            $quantity = $vehicle_fuel_old->quantity;
        }
        return $quantity;
    }
}
