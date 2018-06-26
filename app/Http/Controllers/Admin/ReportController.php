<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Fuel;
use App\Petrolpump;
use App\Staff;
use App\StaffVehicle;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Excel;


class ReportController extends Controller
{
    public function getreport()
    {
        return view('admin.report');

    }
    public function postreport()
    {


        if (\request('date')){
            $date = \request('date');
            if (\request('vehicle_type')=='1'){
                $staffs = Staff::where('created_at',$date)->get();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($staffs){
                    $excel->sheet('Sheet 1',function ($sheet) use ($staffs){
                        $sheet->loadView('admin.report.staff',compact('staffs'));
                    });
                })->export('csv');


            }
            if (\request('vehicle_type')=='2'){
                $designation = Designation::all();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($designation){
                    $excel->sheet('Sheet 1',function ($sheet) use ($designation){
                        $sheet->loadView('admin.report.designation',compact('designation'));
                    });
                })->export('csv');

            }
            if (\request('vehicle_type')=='3'){
                $fuels = Fuel::all();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($fuels){
                    $excel->sheet('Sheet 1',function ($sheet) use ($fuels){
                        $sheet->loadView('admin.report.fuel',compact('fuels'));
                    });
                })->export('csv');

            }
            if (\request('vehicle_type')=='4'){
                $vehicles = Vehicle::all();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($vehicles){
                    $excel->sheet('Sheet 1',function ($sheet) use ($vehicles){
                        $sheet->loadView('admin.report.vehicles',compact('vehicles'));
                    });
                })->export('csv');

            }
            if (\request('vehicle_type')=='5'){
                $staffvehicles = StaffVehicle::all();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($staffvehicles){
                    $excel->sheet('Sheet 1',function ($sheet) use ($staffvehicles){
                        $sheet->loadView('admin.report.staffvehicle',compact('staffvehicles'));
                    });
                })->export('csv');
            }
            if (\request('vehicle_type')=='6') {
                $petrolpump = Petrolpump::all();
                $rep = Excel::create($date . '_' . 'staff', function ($excel) use ($petrolpump) {
                    $excel->sheet('Sheet 1', function ($sheet) use ($petrolpump) {
                        $sheet->loadView('admin.report.petrolpump', compact('petrolpump'));
                    });
                })->export('csv');
            }
        }



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
