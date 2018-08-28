<?php
/**
 * Created by PhpStorm.
 * User: hari
 * Date: 6/28/18
 * Time: 2:53 PM
 */

namespace App\Exports;
use App\Fuel;
use App\Nonofficialfuel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromView;

class FuelExport implements FromView
{
    public function view(): View
    {
        $startdate = \request('start_date');
        $enddate = \request('end_date');
        $cal = new \NepaliCalendar();
        $eng_start_date = $cal->nep_to_eng_date($startdate);
        $eng_start_date = date('Y-m-d',strtotime($eng_start_date));
        $eng_end_date = date('Y-m-d',strtotime($cal->nep_to_eng_date($enddate)));
        $fuels = Fuel::whereBetween('created_at', array($eng_start_date.' 00:00:00',$eng_end_date.' 23:59:59'));

        $nonofficials = Nonofficialfuel::whereBetween('created_at', array($eng_start_date.' 00:00:00',$eng_end_date.' 23:59:59'));

        if (\request('staff_id')){
            $fuels->where('staff_id',\request('staff_id'));
        }
        if (\request('mode')){
            $fuels->where('mode', \request('mode'));
            $nonofficials->where('mode', \request('mode'));
        }
        if (\request('petrolpump_name')){
            $fuels->where('petrolpump_id',\request('petrolpump_name'));
            $nonofficials->where('petrolpump_id',\request('petrolpump_name'));
        }
        if (\request('receiver_id')){
            $fuels->where('receiver_id',\request('receiver_id'));
        }

        if(request('type') != 'o'){
            $nonofficials = $nonofficials->get();
        }else{
            $nonofficials = [];
        }
        if(request('type') != 'n'){
            $fuels = $fuels->get();
        }else{
            $fuels = [];
        }


        return view('admin.report.fuel', [
            'fuels' => $fuels,
            'nonofficials' => $nonofficials
        ]);
    }
}