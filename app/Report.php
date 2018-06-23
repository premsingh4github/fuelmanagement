<?php
namespace App;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Report implements FromView
{
    public function view(): View
    {
        return \view('report');
    }
}