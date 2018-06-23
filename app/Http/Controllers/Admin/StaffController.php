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
       return view('admin.staff.create',compact('des',''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'joining_date'=>'required',
        ]);


        $staff = new Staff;
        $staff->name = \request('name');
        $staff->designation_id = \request('designation');
        $staff->joining_date = date('Y-m-d',strtotime(\request('joining_date')));
        if(\request('licence_no')){
            $staff->licence_no = \request('licence_no');
        }
        $staff->status = '1';
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



        ]);
//        dd($request->all());
        $staff = Staff::findOrfail($id);
        $staff->name = \request('name');
        $staff->designation_id = \request('designation');
        $staff->joining_date = date('Y-m-d',strtotime(\request('joining_date')));
        $staff->licence_no = \request('licence_no');
        $staff->status = \request('status');
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
