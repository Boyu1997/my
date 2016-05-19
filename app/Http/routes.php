<?php

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', function () {
        return view('home');
    });


    Route::get('/wage', 'WageController@getOverview');
    Route::get('/wage/{year}/{month}', 'WageController@getMonthly');

    Route::get('/product/id/{id}', 'ProductController@getById');

    Route::get('/produce', 'ProduceController@getOverview');
    Route::get('/produce/create', 'ProduceController@getCreate');
    Route::post('/produce/create', 'ProduceController@postCreate');
    Route::get('/produce/{year}/{month}', 'ProduceController@getMonthly');
    Route::get('/produce/id/{id}/edit', 'ProduceController@getEditId');

    Route::get('/install', 'InstallController@getOverview');
    Route::get('/install/create', 'InstallController@getCreate');
    Route::post('/install/create', 'InstallController@postCreate');
    Route::get('/install/{year}/{month}', 'InstallController@getMonthly');
    Route::get('/install/id/{id}', 'InstallController@getIdRedirect');
    Route::get('/install/id/{id}/edit', 'InstallController@getEditId');
});
