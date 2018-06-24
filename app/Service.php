<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function quotaByStaffVehicleId($id)
    {
        $quota = 0;
        $vehicle_service = VehicleService::select('quota')->where('service_id',$this->id)->where('staff_vehicle_id',$id)->first();
        if($vehicle_service){
            $quota = $vehicle_service->quota;
        }
        return $quota;
    }
}
