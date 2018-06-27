<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class StaffVehicle  implements FromCollection
{
    public function collection()
    {
        return StaffVehicle::all();
    }
}