<?php

namespace App\Http\Controllers\Admin;

use App\Staff;
use App\StaffVehicle;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.staffvehicle.index');
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
        dd($request->all());
        $this->validate($request,[
            'staff'=>'required',
        'ownership'=>'required',
        ]);

        $staff_veh = new StaffVehicle;
        $staff_veh->staff_id = \request('staff');
        $staff_veh->ownership = \request('ownership');
        $staff_veh->driver_id = \request('driver');
        $staff_veh->save();
        if (\request('vehicle_brand')){


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
