<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Designation implements FromCollection
{
    public function collection()
    {
        return Designation::all();
    }
}