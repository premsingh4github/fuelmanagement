<?php

namespace App\Http\Controllers\Admin;

use App\PersonalVehicle;
use App\Service;
use App\Staff;
use App\StaffVehicle;
use App\Vehicle;
use App\VehicleService;
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
       $staffs = Staff::select('staff.id','staff.name')->join('designations','staff.designation_id','=','designations.id')->orderBy('designations.level','DESC')->get();
       $vehicle = Vehicle::all();
       $drivers =  Staff::whereHas('designation',function ($q){
           $q->where('name','Driver');
       })->get();
       $services = Service::all();

        return view('admin.staffvehicle.create',compact('staffs','vehicle','drivers','services'));
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
        $services = Service::all();
        foreach ($services as $service){
            if(\request($service->id) && (\request($service->id) > 0 ) ){
                $vehicleService = new VehicleService;
                $vehicleService->service_id = $service->id;
                $vehicleService->quota = \request($service->id);
                $vehicleService->staff_vehicle_id = $staff_veh->id;
                $vehicleService->save();
            }
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
        $staff = Staff::select('staff.id','staff.name')->join('designations','staff.designation_id','=','designations.id')->orderBy('designations.level','DESC')->get();
        $vehicle = Vehicle::all();
        $drivers =  Staff::whereHas('designation',function ($q){
            $q->where('name','Driver');
        })->get();
        return view('admin.staffvehicle.edit',compact('staff_veh','staff','vehicle','drivers'));

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
        $this->validate(\request(),[
            'vehicle_id'=>'required'
        ]);
        $vehicle = Vehicle::findOrFail(\request('vehicle_id'));
        return view('admin.ajax.vehicledetail',compact('vehicle'));
    }

    public function getStaffdetail()
    {
        $this->validate(\request(),[
            'staff_id'=>'required'
        ]);
        $staff = Staff::findOrFail(\request('staff_id'));
        return view('admin.ajax.staffdetail',compact('staff'));
    }
}
