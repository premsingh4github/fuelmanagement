<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Exports\Staff11;
use App\Fuel;
use App\Petrolpump;
use App\Staff;
use App\StaffVehicle;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
//use Maatwebsite\Excel\Facades\Excel;

use Excel;
use App\Exports\DataExport;

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
//
                return Excel::download(new Staff, $date.'_'.'staff.csv');


                $staffs = Staff::where('joining_date',$date)->get();
                $rep = Excel::create($date.'_'.'staff',function ($excel)use($staffs){
                    $excel->sheet('Sheet 1',function ($sheet) use ($staffs){
                        $sheet->loadView('admin.report.staff',compact('staffs'));
                    });
                })->export('xls');
            }
            if (\request('vehicle_type')=='2'){
                return Excel::download(new Designation, $date.'_'.'designation.xls');

            }
            if (\request('vehicle_type')=='3'){

//                dd(90);

                return Excel::download(new Fuel, $date.'_'.'fuel.xls');

//                $fuels = Fuel::where('date',$date)->get();
//                $rep = Excel::create($date.'_'.'fuel',function ($excel)use($fuels){
//                    $excel->sheet('Sheet 1',function ($sheet) use ($fuels){
//                        $sheet->loadView('admin.report.fuel',compact('fuels'));
//                    });
//                })->export('csv');

            }
            if (\request('vehicle_type')=='4'){
                return Excel::download(new Vehicle, $date.'_'.'vehicle.xls');
//                $vehicles = Vehicle::where('registered_date',$date)->get();
//                $rep = Excel::create($date.'_'.'vehicles',function ($excel)use($vehicles){
//                    $excel->sheet('Sheet 1',function ($sheet) use ($vehicles){
//                        $sheet->loadView('admin.report.vehicles',compact('vehicles'));
//                    });
//                })->export('csv');

            }
            if (\request('vehicle_type')=='5'){
                return Excel::download(new StaffVehicle, $date.'_'.'staffvehicle.xls');
//                $staffvehicles = StaffVehicle::all();
//                $rep = Excel::create($date.'_'.'staffvehicles',function ($excel)use($staffvehicles){
//                    $excel->sheet('Sheet 1',function ($sheet) use ($staffvehicles){
//                        $sheet->loadView('admin.report.staffvehicle',compact('staffvehicles'));
//                    });
//                })->export('csv');
            }
            if (\request('vehicle_type')=='6') {

                return Excel::download(new Petrolpump, $date.'_'.'petrolpump.xls');
//                $petrolpump = Petrolpump::all();
//                $rep = Excel::create($date . '_' . 'petrolpump', function ($excel) use ($petrolpump) {
//                    $excel->sheet('Sheet 1', function ($sheet) use ($petrolpump) {
//                        $sheet->loadView('admin.report.petrolpump', compact('petrolpump'));
//                    });
//                })->export('csv');
            }
            if (\request('vehicle_type')=='7') {
                return Excel::download(new User, $date.'_'.'user.csv');

//                $users = User::where('type','2')->get();
//                $rep = Excel::create('_'.'user', function($excel) use($users) {
//                    $excel->sheet('Sheet 1', function($sheet) use($users) {
//                        $sheet->loadView('admin.report.users',compact('users'));
////                        $sheet->loadView('admin.report.aa');
//                    });

//                })->export('xls');


            }
            if (isset($rep)){
                Session::flash('success_message','Report created Succefully');
                return redirect('admin/report');
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
