<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;

class Staff implements FromCollection
{
    public function collection()
    {
        return Staff::all();

    }
}