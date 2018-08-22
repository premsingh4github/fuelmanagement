<?php

namespace App\Http\Controllers;

use App\Nonofficialfuel as Model;
use App\Nonofficialfuel;
use App\Petrolpump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use NepaliCalendar;

class NonofficialfuelController extends Controller
{
    protected $view = 'nonofficialfuels.';
    protected $url = 'nonofficialfuels';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fuels= Model::orderBy('id','DESC')->get();
        return  view($this->view.'index',compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pump = Petrolpump::all();
        $cal = new NepaliCalendar();
        $today_nepali = $cal->eng_to_nepali_date(date('Y-m-d'));
        return view($this->view.'create',compact('pump','today_nepali'));
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
            'name'=>'required',
            'organization'=>'required',
            'vehicle_no'=>'required',
            'month_id'=>'required',
            'mode'=>'required',
            'petrolpump_name'=>'required',
            'receiver_name'=>'required',
            'petrol'=>'required',
            'diseal'=>'required',
            'engine_oil'=>'required',
        ]);
        $fuel= new  Model;
        $fuel->date = date('Y-m-d');
        $fuel->name = \request('name');
        $fuel->organization = \request('organization');
        $fuel->vehicle_no = \request('vehicle_no');
        $fuel->month_id = \request('month_id');
        $fuel->mode = \request('mode');
        $fuel->amount = \request('amount');
        $fuel->coupon = \request('coupon');
        $fuel->petrolpump_id = \request('petrolpump_name');
        $fuel->receiver_name = \request('receiver_name');
        $fuel->petrol = \request('petrol');
        $fuel->diseal = \request('diseal');
        $fuel->engine_oil = \request('engine_oil');
        $fuel->user_id = Auth::user()->id;
        $fuel->save();
        Session::flash('success_message','Fuel Added');
        return redirect($this->url."/print/".$fuel->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuel = Model::findOrFail($id);
        return view($this->view.'show',compact('fuel'));
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
        $fuel = Model::findOrfail($id);
        $cal = new NepaliCalendar();
        $today_nepali = $cal->eng_to_nepali_date(date('Y-m-d'));
        return view($this->view.'edit',compact('fuel','pump','today_nepali'));

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
            'organization'=>'required',
            'vehicle_no'=>'required',
            'month_id'=>'required',
            'mode'=>'required',
            'petrolpump_name'=>'required',
            'receiver_name'=>'required',
            'petrol'=>'required',
            'diseal'=>'required',
            'engine_oil'=>'required',
        ]);
        $fuel= Model::findOrfail($id);
        $fuel->name = \request('name');
        $fuel->organization = \request('organization');
        $fuel->vehicle_no = \request('vehicle_no');
        $fuel->month_id = \request('month_id');
        $fuel->mode = \request('mode');
        $fuel->amount = \request('amount');
        $fuel->coupon = \request('coupon');
        $fuel->petrolpump_id = \request('petrolpump_name');
        $fuel->receiver_name = \request('receiver_name');
        $fuel->petrol = \request('petrol');
        $fuel->diseal = \request('diseal');
        $fuel->engine_oil = \request('engine_oil');
        $fuel->save();
        Session::flash('success_message','Fuel Updated succefully');
        return redirect($this->url."/print/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuel = Model::findOrfail($id);
        $fuel->delete();
        Session::flash('success_message','Fuel Deleted Succefully');
        return redirect($this->url);
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
        $entry = Model::findOrFail($id);
        return view($this->view.'print',compact('entry'));
    }
}
