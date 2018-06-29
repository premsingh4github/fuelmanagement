<?php
/**
 * Created by PhpStorm.
 * User: hari
 * Date: 6/28/18
 * Time: 2:53 PM
 */

namespace App\Exports;
use App\Fuel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class view1 implements FromView
{
    public function view(): View
    {
        return view('admin.report.fuel', [
            'fuels' => Fuel::all()
        ]);
    }
}