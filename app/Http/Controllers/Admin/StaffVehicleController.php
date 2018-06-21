<?php

namespace App\Http\Controllers\Admin;

use App\PersonalVehicle;
use App\Staff;
use App\StaffVehicle;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff_veh = StaffVehicle::orderBy('id','DESC')->get();
        return view('admin.staffvehicle.index',compact('staff_veh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $staff = Staff::all();
       $vehicle = Vehicle::all();
        return view('admin.staffvehicle.create',compact('staff','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'staff'=>'required',
        'ownership'=>'required',
        ]);

        $staff_veh = new StaffVehicle;
        $staff_veh->staff_id = \request('staff');
        $staff_veh->ownership = \request('ownership');
        $staff_veh->driver_id = \request('driver');
        if(\request('ovehicle'))
        {
            $staff_veh->vehicle_id  = \request('ovehicle');
        }
        $staff_veh->save();
        if (\request('vehicle_brand')){

            $personal_veh = new PersonalVehicle;
            $personal_veh->vehicle_brand = \request('vehicle_brand');
            $personal_veh->vehicle_no = \request('vehicle_no');
            $personal_veh->mileage = \request('mileage');
            $personal_veh->staff_vehicle_id = $staff_veh->id;
            $personal_veh->save();

        }
        Session::flash('success_message','Staff Vehicle Added');
        return redirect('admin/staff_vehicle');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff_veh = StaffVehicle::findOrfail($id);
//        $per_veh = PersonalVehicle::where('staff_vehicle_id',$staff_veh->id)->get();
//        dd($per_veh);
        return view('admin.staffvehicle.show',compact('staff_veh','per_veh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff_veh = StaffVehicle::findOrfail($id);
        $staff = Staff::all();
        $vehicle = Vehicle::all();
        return view('admin.staffvehicle.edit',compact('staff_veh','staff','vehicle'));

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
//        dd($request->all());
        $this->validate($request,[
            'staff'=>'required',
            'ownership'=>'required',
        ]);

        $staff_veh =StaffVehicle::findOrfail($id);
        $staff_veh->staff_id = \request('staff');
        $staff_veh->ownership = \request('ownership');
        $staff_veh->driver_id = \request('driver');
        if(\request('ovehicle'))
        {
            $staff_veh->vehicle_id  = \request('ovehicle');
        }
        $staff_veh->save();
        if (\request('vehicle_brand')){

            $personal_veh =PersonalVehicle::findOrfail($staff_veh->id);
            $personal_veh->vehicle_brand = \request('vehicle_brand');
            $personal_veh->vehicle_no = \request('vehicle_no');
            $personal_veh->mileage = \request('mileage');
            $personal_veh->staff_vehicle_id = $staff_veh->id;
            $personal_veh->save();

        }
        Session::flash('success_message','Staff Vehicle Updated');
        return redirect('admin/staff_vehicle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $staff_veh = StaffVehicle::findOrfail($id);
        $staff_veh->delete();
        Session::flash('success_message','Staff Vehical Delete');

        return redirect('admin/staff_vehicle');

    }

    public function getvehicledetail()
    {
        dd(99);

        $this->validate(\request(),[
            'vehicle_id'=>'required'
        ]);
        $vehicle = Vehicle::findOrFail(\request('vehicle_id'));
        return view('ajax.vehicledetail',compact('vehicle'));
    }
}
