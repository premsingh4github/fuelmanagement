<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Vehicle implements FromCollection
{
    public function collection()
    {
        return Vehicle::all();
    }
}