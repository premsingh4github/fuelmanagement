<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class User implements FromCollection
{
    public function collection()
    {
        return \App\User::all();
    }
}