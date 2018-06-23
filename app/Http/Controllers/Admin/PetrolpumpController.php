<?php

namespace App\Http\Controllers\Admin;

use App\Petrolpump;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PetrolpumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pumps = Petrolpump::orderBy('id','DESC')->get();
        return view('admin.petrolpump.index',compact('pumps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petrolpump.create');
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
           'name'=>'required'
        ]);
        $pump = new  Petrolpump;
        $pump->name = \request('name');
        $pump->save();

        Session::flash('success_message','PetrolPump Added');
        return redirect('admin/petrolpump');
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
        $pump = Petrolpump::findOrfail($id);
        return view('admin.petrolpump.edit',compact('pump'));
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
            'name'=>'required'
        ]);
        $pump = Petrolpump::findOrfail($id);
        $pump->name = \request('name');
        $pump->save();

        Session::flash('success_message','PetrolPump Updated');
        return redirect('admin/petrolpump');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pump = Petrolpump::findorfail($id);
        $pump->delete();

        Session::flash('success_message',$pump->name .'Deleted Succefully');
        return redirect('admin/petrolpump');
    }
}
