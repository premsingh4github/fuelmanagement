<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Staff;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::orderBy('id','DESC')->get();

        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $des =Designation::all();
        $vehicle =Vehicle::all();
       return view('admin.staff.create',compact('des','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(\request()->all());
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'joining_date'=>'required',
            'vehicle_ownership'=>'required',
            'vehicle_type'=>'required',
            'monthly_kota'=>'required',


        ]);
        $staff = new Staff;
        $staff->name = \request('name');
        $staff->designation_id = \request('designation');
        $staff->joining_date = date('Y-m-d',strtotime(\request('joining_date')));
        $staff->licence_no = \request('licence_no');
        $staff->vehicle_ownership = \request('vehicle_ownership');
        $staff->vehicle_type = \request('vehicle_type');
        $staff->office_vehicle = \request('office_vehicle');
        $staff->vehicle_brand = \request('vehicle_brand');
        $staff->mileage = \request('mileage');
        $staff->monthly_kota = \request('monthly_kota');
        $staff->engine_oil = \request('engine_oil');
        $staff->driving_person_name = \request('driving_person_name');
        $staff->save();

        Session::flash('success_message',"Staff added");
        return redirect('admin/staff');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff =Staff::findOrfail($id);
        return view('admin.staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrfail($id);
        $des = Designation::all();
        $vehicle = Vehicle::all();
        return view('admin.staff.edit',compact('staff','des','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'joining_date'=>'required',
            'vehicle_ownership'=>'required',
            'vehicle_type'=>'required',
            'monthly_kota'=>'required',


        ]);
        $staff = Staff::findOrfail($id);
        $staff->name = \request('name');
        $staff->designation_id = \request('designation');
        $staff->joining_date = date('Y-m-d',strtotime(\request('joining_date')));
        $staff->licence_no = \request('licence_no');
        $staff->vehicle_ownership = \request('vehicle_ownership');
        $staff->vehicle_type = \request('vehicle_type');
        $staff->office_vehicle = \request('office_vehicle');
        $staff->vehicle_brand = \request('vehicle_brand');
        $staff->mileage = \request('mileage');
        $staff->monthly_kota = \request('monthly_kota');
        $staff->engine_oil = \request('engine_oil');
        $staff->driving_person_name = \request('driving_person_name');
        $staff->save();

        Session::flash('success_message',"Staff Updated");
        return redirect('admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrfail($id);
        $staff->delete();

        Session::flash('success_message',"Staff Deleted");
        return redirect('admin/staff');

    }
}
