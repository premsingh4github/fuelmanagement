<?php

namespace App\Http\Controllers\Admin;

use App\Fuel;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return  view('admin.fuel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::all();
        return view('admin.fuel.create',compact('staff'));
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
            'date'=>'required',
            'staff_name'=>'required',
            'month'=>'required',
            'mode'=>'required',
            'petrolpump_name'=>'required',
            'quantity'=>'required',
        ]);
        $fuel= new  Fuel;
        $fuel->date =\request('date');
        $fuel->staff_name = \request('staff_name');
        $fuel->month = \request('month');
        $fuel->mode = \request('mode');
        $fuel->amount = \request('amount');
        $fuel->petrolpump_name = \request('petrolpump_name');
        $fuel->other = \request('other');
        $fuel->quantity = \request('quantity');
        $fuel->current_km = \request('current_km');
        $fuel->previous_km = \request('previous_km');
        $fuel->reciver_name = \request('reciver_name');
        $fuel->save();

        Session::flash('success_message','Fuel Added');
        return redirect('admin\fuel');

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

    public function checkquantity()
    {
        dd(90);

    }
}
