<?php


Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', function () {
        $user = \App\User::where('id', '=', Auth::id())->first();
        $employee = \App\Employee::where('id', '=', $user->id)->first();
        $privilege = \App\Privilege::where('employee_id', '=', $employee->id)->first();
        return view('home', compact('user', 'employee', 'privilege'));
    });


    Route::get('/wage', 'WageController@getOverview');
    Route::get('/wage/{year?}/{month?}', 'WageController@getMonthly');
    Route::get('/wage', 'WageController@getOverview');


});
