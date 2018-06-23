<?php

namespace App\Http\Controllers\Admin;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ReportController extends Controller
{
    public function getreport()
    {
        return view('admin.report');

    }

    public function getreport_ajax()
    {
//        dd(\request('field'));
        if (\request('field')=='1'){
            $staffs = Staff::all();

//            $rep = Excel::create('staff', function($excel) use($staffs) {
//                $excel->sheet('Sheet 1', function($sheet) use($staffs) {
//                    $sheet->loadView('report.staff',compact('staffs'));
//                });
//            })->export('csv');

            $rep = Excel::create('staff',function ($excel) use($staffs){
                $excel->sheet('Sheet 1',function ($sheet) use($staffs){
                    $sheet->loadView('report.staff',compact('staffs'));
                });
            })->export('xls');

        }

    }
}
