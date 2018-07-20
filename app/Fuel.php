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
        return $this->hasMany(FuelService::class,'fuel_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Staff::class,'receiver_id');
    }

    public function petrolpump()
    {
        return $this->belongsTo(Petrolpump::class,'petrolpump_id');

    }

    public function service_quantity($service_id)
    {
        $fuel_service = $this->fuel_services()->whereHas('vehicle_service',function ($q) use ($service_id){
            $q->where('service_id',$service_id);
        });
        if($fuel_service->count() > 0){
            return $fuel_service->orderBy('id','DESC')->first()->quantity;
        }
        return 0;

    }

    public function last()
    {
       if($this->id == $this->staff->fuels()->orderBy('id','DESC')->first()->id){
           return true;
       }
       return false;
    }
}
