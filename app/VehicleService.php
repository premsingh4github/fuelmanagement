<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    protected $fillable = ['service_id','staff_vehicle_id'];
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function staffVehicle()
    {
        return $this->belongsTo(StaffVehicle::class);
    }
    public function fuelServices(){
        return $this->hasMany(FuelService::class)->orderBy('id','DESC');
    }
    public function totalquantity($staff_id,$month_id)
    {
           $total = 0;
            $total   += FuelService::whereHas('fuel',function ($q) use ($month_id,$staff_id){
                $q->where('month_id',$month_id)->where('staff_id',$staff_id);
           })->where('vehicle_service_id',$this->id)->sum('quantity');
           return $total;
    }
}
