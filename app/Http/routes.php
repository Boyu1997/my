<?php


Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/show-login-status', function() {

        # You may access the authenticated user via the Auth facade
        $user = Auth::user();

        if($user) {
            echo 'You are logged in.';
            dump($user->toArray());
        } else {
            echo 'You are not logged in.';
        }

        return;

    });


    Route::get('/', function () {
        $user = \App\User::where('id', 'LIKE', Auth::id())->first();
        $username = $user->username;
        return view('home', compact('username'));
    });


    Route::get('/wage', 'WageController@getOverview');
    Route::get('/wage/{year?}/{month?}', 'WageController@getMonthly');
    Route::get('/wage', 'WageController@getOverview');


});
