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
        $startdate = \request('start_date');
        $enddate = \request('end_date');


        if (\request('staff_id')){
            $fuels =Fuel::where('staff_id','staff_id');
        }
        if (\request('mode')){
            $fuels = Fuel::where('mode','mode');
        }
        if (\request('petrolpump_name')){
            $fuels= Fuel::where('petrolpump_id','petrolpump_name');
        }
        if (\request('receiver_id')){
            $fuels = Fuel::where('receiver_id','receiver_id');
        }
        $fuels =$fuels->get();
        return view('admin.report.fuel', [
            'fuels' => $fuels
        ]);
    }
}