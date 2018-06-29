<?php

namespace App\Http\Controllers\Admin;


use App\Fuel;
use App\PersonalVehicle;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
//use Maatwebsite\Excel\Facades\Excel;

use Excel;

use App\Exports\View1;

class ReportController extends Controller
{
    public function getreport()
    {
        $staffs = Staff::all();
        $petrolpump = \App\Petrolpump::all();
        return view('admin.report',compact('staffs','petrolpump'));

    }
    public function postreport()
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




        return Excel::download(new View1, "fuel_$startdate _ $enddate.xls");








    }

    public function getreport_ajax()
    {
//        dd(\request('field'));
//        if (\request('field')=='1'){
//            $staffs = Staff::all();
//
//
//
//            $rep = Excel::create('staff',function ($excel) use($staffs){
//                $excel->sheet('Sheet 1',function ($sheet) use($staffs){
//                    $sheet->loadView('report.staff',compact('staffs'));
//                });
//            })->export('xls');
//
//        }

    }
}
