<?php

namespace App\Http\Controllers\Admin;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::orderBy('id','DESC')->get();
        return view('admin.vehicle.index',compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
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

            'vehicle_type'=>'required',
            'brand'=>'required',
            'engine_no'=>'required',
            'chasis_no'=>'required',
            'registered_date'=>'required',
            'vehicle_no'=>'required',
            'current_km'=>'required',
            'ownership'=>'required'
        ]);
        $vehicle = new  Vehicle;
        $vehicle->type = \request('vehicle_type');
        $vehicle->brand = \request('brand');
        if(\request('mileage')){
            $vehicle->mileage = \request('mileage');
        }
        $vehicle->engine_no = \request('engine_no');
        $vehicle->chassis_no = \request('chasis_no');
        $vehicle->registered_date = date( \request('registered_date'));
        $vehicle->vehicle_no = \request('vehicle_no');
        $vehicle->current_km = \request('current_km');
        $vehicle->official = \request('ownership');
        $vehicle->save();

        Session::flash('success_message','Vehicle Added');
         return redirect('admin/vehicle');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findorfail($id);
        return view('admin.vehicle.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle =Vehicle::findorFail($id);

        return view('admin.vehicle.edit',compact('vehicle'));
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
        'vehicle_type'=>'required',
            'brand'=>'required',
            'engine_no'=>'required',
            'chasis_no'=>'required',
            'registered_date'=>'required',
            'vehicle_no'=>'required',
            'current_km'=>'required',
        ]);
        $vehicle = Vehicle::findOrfail($id);
        $vehicle->type = \request('vehicle_type');
        $vehicle->brand = \request('brand');
        if(\request('mileage')){
            $vehicle->mileage = \request('mileage');
        }
        $vehicle->engine_no = \request('engine_no');
        $vehicle->chassis_no = \request('chasis_no');
        $vehicle->registered_date = date( \request('registered_date'));
        $vehicle->vehicle_no = \request('vehicle_no');
        $vehicle->current_km = \request('current_km');
        $vehicle->official = \request('ownership');
        $vehicle->save();

        Session::flash('success_message','Vehicle Updated');
         return redirect('admin/vehicle');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findorfail($id);
        $vehicle->delete();
        Session::flash('success_message','Vehicle Deleted');
        return redirect('admin/vehicle');
    }

    public function getvehicles()
    {
        \request()->validate([
            'ownership_id'=>'required'
        ]);
        $vehicles = Vehicle::where('official',\request('ownership_id'))->get();
        return view('admin.ajax.vehicles',compact('vehicles'));
    }
}
