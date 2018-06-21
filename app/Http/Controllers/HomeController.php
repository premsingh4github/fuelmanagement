<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       return view('login');
    }

    public function postlogin()
    {
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

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
