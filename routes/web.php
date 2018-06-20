<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('login','HomeController@getlogin');
Route::post('login','HomeController@postlogin');



Route::get('logout', 'HomeController@logout');




Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
    Route::get('','Admin\AdminController@index');
    Route::resource('staff','Admin\StaffController');
    Route::resource('designation','Admin\DesignationController');
    Route::resource('vehicle','Admin\VehicleController');
    Route::get('checkquantity','Admin\FuelController@checkquantity');
    Route::resource('fuel','Admin\FuelController');





});


Route::group(['middleware'=>'user','prefix'=>'user'],function (){
    Route::get('','user\UserController@index');
});


Route::get('/home', 'HomeController@index')->name('home');
