<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getlogin()
    {
        if(Auth::check()){
            if (Auth::user()->type ==1) {
                return redirect('admin');
            }
            if (Auth::user()->type ==2) {
                return redirect('user');
            }
        }
       return view('login');
    }

    public function postlogin()
    {
//        dd(\request()->all());



        if (Auth::attempt(['email' => \request('email'),'password'=> \request('password'),'status'=>'1'])){
            if (Auth::check()){
                if (Auth::user()->type ==1) {
                    return redirect('admin');
                }
                if (Auth::user()->type ==2) {
                    return redirect('user');
                }
            }
        }
        else{
            return redirect()->back()->withErrors(['email'=>'These credentials do not match our records.'])->withInput(request()->only('email'));
        }
    }
    public function updateProfile(){

    }

    public function profile()
    {
        return view('profile');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function excel(Excel $excel)
    {

    }
    public function change_password()
    {
        return view('auth.change_password');
    }
    public function update_password(Request $request)
    {
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        );
        $this->validate(request(), $rules);
        if (Hash::check(request('old_password'), Auth::user()->password)) {
            Auth::user()->update([
                'password' => bcrypt(request('password'))
            ]);
            Session::flash('success_message', 'Password has been changed successfully ');
        } else {
            Session::flash('error_message', 'Old password Incorrect');
        }
        return redirect()->back();
    }
}
