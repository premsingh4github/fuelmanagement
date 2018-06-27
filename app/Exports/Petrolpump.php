<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Petrolpump implements FromCollection
{
    public function collection()
    {
        return Petrolpump::all();
    }
}