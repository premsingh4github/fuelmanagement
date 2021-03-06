<?php

namespace App\Http\Controllers\Admin;

use App\Fuel;
use App\FuelService;
use App\Petrolpump;
use App\Staff;
use App\VehicleFuel;
use App\VehicleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fuels= Fuel::orderBy('id','DESC')->get();
        return  view('admin.fuel.index',compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pump = Petrolpump::all();
        $staff = Staff::select('staff.id','staff.name')->whereHas('staff_vehicles')->join('designations','staff.designation_id','=','designations.id')->where('status','1')->orderBy('designations.level','ASC')->get();
        $staffs = Staff::where('status','1')->get();
        $cal = new \NepaliCalendar();
        $today_nepali = $cal->eng_to_nepali_date(date('Y-m-d'));
        return view('admin.fuel.create',compact('staff','today_nepali','staffs','pump'));
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
            'staff_id'=>'required',
            'month'=>'required',
            'mode'=>'required',
            'petrolpump_name'=>'required',
        ]);
        $staff = Staff::findOrFail(\request('staff_id'));
        $fuel= new  Fuel;
        $cal = new \NepaliCalendar();
        $fuel->date = $cal->eng_to_nepali_date(date('Y-m-d'));
        $fuel->staff_id = \request('staff_id');
        $fuel->month_id = \request('month');
        $fuel->mode = \request('mode');
        $fuel->amount = \request('amount');
        $fuel->coupon = \request('coupon');
        $fuel->petrolpump_id = \request('petrolpump_name');
        if(\request('other')){
            $fuel->other = \request('other');
        }
        $fuel->current_km = \request('current_km');
        $fuel->previous_km = $staff->previous_km();
        $fuel->receiver_id = \request('receiver_id');
        $fuel->user_id = Auth::user()->id;
        if(\request('servicing') == '1'){
            $fuel->servicing = \request('servicing');
        }
        else{
            $fuel->servicing = '0';
        }
        $fuel->save();

        if(\request('service')){
            foreach (\request('service') as $key => $value){
                if($value > 0){
                    $fuel_service = new FuelService;
                    $fuel_service->quantity = $value;
                    $fuel_service->vehicle_service_id = $key;
                    $fuel_service->fuel_id = $fuel->id;
                    $fuel_service->save();
                }
                $vehicle_service = VehicleService::findOrFail($key);
                $vehicle = $fuel->staff->vehicles()->first();
                if( ($vehicle_service->service_id != 3) && ($vehicle->type != 1) ){
                        $vehicle_fuel = new VehicleFuel;
                        $vehicle_fuel->fuel_id = $fuel->id;
                        $vehicle_fuel->service_id = $vehicle_service->service_id;
                        $vehicle_fuel->mileage= (float) $fuel->staff->vehicles()->first()->mileage;
                        $vehicle_fuel->vehicle_id = $vehicle->id;
                        $vehicle_fuel->user_id = Auth::user()->id;

                        $old_quantity = 0;
                        if($vehicle_fuel_old = VehicleFuel::select('quantity')->where('service_id',$vehicle_fuel->service_id)->where('vehicle_id',$vehicle_fuel->vehicle_id)->orderBy('id','DESC')->first()){
                            $old_quantity = $vehicle_fuel_old->quantity;
                        }

                        $month_fuel = ($fuel->current_km - $fuel->previous_km)/$vehicle_fuel->mileage ;
                        $vehicle_fuel->quantity = $old_quantity - $month_fuel + $value;
                        $vehicle_fuel->save();
                }
            }
        }
        Session::flash('success_message','Fuel Added');
        return redirect('admin/fuel/print/'.$fuel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuel = Fuel::findOrFail($id);
        return view('admin.fuel.show',compact('fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pump = Petrolpump::all();
        $staff = Staff::whereHas('vehicles')->get();
        $staffs = Staff::where('status','1')->get();
        $fuel = Fuel::findOrfail($id);
        return view('admin.fuel.edit',compact('staff','today_nepali','staffs','fuel','pump'));

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
            'staff_id'=>'required',
            'month'=>'required',
            'mode'=>'required',
            'petrolpump_name'=>'required',
        ]);
        $fuel= Fuel::findOrfail($id);
        if(!$fuel->last()){
            return redirect()->back();
        }
        $fuel->staff_id = \request('staff_id');
        $fuel->month_id = \request('month');
        $fuel->mode = \request('mode');
        if(\request('mode')){
            $fuel->amount = \request('amount');
        }
        $fuel->petrolpump_id = \request('petrolpump_name');
        if(\request('other')){
            $fuel->other = \request('other');
        }
        if(\request('servicing')){
            $fuel->servicing = \request('servicing');
        }
        $fuel->current_km = \request('current_km');
        $fuel->receiver_id = \request('receiver_id');
        if(\request('servicing')){
            $fuel->servicing = \request('servicing');
        }
        $fuel->save();
        if(\request('service')){
            foreach (\request('service') as $key => $value){
                if($value > 0){
                    $fuel_service = FuelService::firstOrNew(['vehicle_service_id'=>$key,'fuel_id'=>$fuel->id]);
                    $fuel_service->quantity = $value;
                    $fuel_service->save();
                }
            }
        }
        Session::flash('success_message','Fuel Updated succefully');
        return redirect('admin/fuel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuel = Fuel::findOrfail($id);
        $fuel->fuel_services()->delete();
        $fuel->delete();
        Session::flash('success_message','Fuel Deleted Succefully');
        return redirect('admin/fuel');
    }

    public function checkquantity()
    {
        dd(90);
    }
    public function staff_services()
    {
        \request()->validate([
            'staff_id'=>'required|exists:staff,id'
        ]);
        $staff = Staff::findOrFail(\request('staff_id'));
        return view('admin.ajax.staff_services',compact('staff'));
    }

    public function meterdetail()
    {
        $this->validate(\request(),['staff_id'=>'required']);
        $staff = Staff::findOrFail(\request('staff_id'));
        $staff->previous_km();
        $vehicle = $staff->vehicles()->first();
        if($vehicle->type == '1'){
            return "";
        }
        return view('admin.ajax.old_fuel',compact('vehicle','staff'));
    }

    public function print($id)
    {
        $entry = Fuel::findOrFail($id);
        return view('admin.fuel.print',compact('entry'));

    }
}

