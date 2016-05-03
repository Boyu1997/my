<?php

Route::get('/', function () {
    return view('home');
});




Route::group(['middleware' => ['web']], function () {
    //
});
