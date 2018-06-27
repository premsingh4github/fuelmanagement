<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Fuel implements FromCollection
{
    public function collection()
    {
        return  Fuel::all();

    }
}