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
Route::get('login','HomeController@getlogin')->name('login');
Route::post('login','HomeController@postlogin');



Route::get('logout', 'HomeController@logout');




Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
    Route::get('','Admin\AdminController@index');
    Route::resource('staff','Admin\StaffController');
    Route::resource('designation','Admin\DesignationController');
    Route::resource('vehicle','Admin\VehicleController');
    Route::get('checkquantity','Admin\FuelController@checkquantity');





    Route::resource('staff_vehicle','Admin\StaffVehicleController');
    Route::resource('petrolpump','Admin\PetrolpumpController');
    Route::get('report','Admin\ReportController@getreport');
    Route::post('report','Admin\ReportController@postreport');
    Route::get('getreport','Admin\ReportController@getreport_ajax');

    Route::resource('users','Admin\UserController');








});


Route::group(['middleware'=>'user','prefix'=>'user'],function (){
    Route::get('','user\UserController@index');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('profile','HomeController@profile');
    Route::post('profile','HomeController@updateProfile');

    Route::resource('admin/fuel','Admin\FuelController');

    Route::get('admin/getStaffdetail','Admin\StaffVehicleController@getStaffdetail');
    Route::get('admin/staff_services','Admin\FuelController@staff_services');
    Route::get('admin/getvehicles','Admin\VehicleController@getvehicles');
    Route::get('admin/vehicledetail','Admin\StaffVehicleController@getvehicledetail');
    Route::get('getcurrentmeter','Admin\StaffVehicleController@getcurrentmeter');

    Route::get('/home', 'HomeController@index')->name('home');

});




Route::get('excel','HomeController@excel');
