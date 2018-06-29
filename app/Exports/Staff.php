<?php

namespace App\Exports;
use App\Staff;


use Maatwebsite\Excel\Concerns\FromCollection;

class Staff implements FromCollection
{
    public function collection()
    {
        return Staff::all();

    }
}