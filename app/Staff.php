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

}
