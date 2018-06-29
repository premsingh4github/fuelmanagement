<?php

namespace App\Exports;
 use App\Fuel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuelExport implements FromCollection
{
    public function collection()
    {
        return  Fuel::all();

    }

}