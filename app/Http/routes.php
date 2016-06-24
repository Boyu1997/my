<?php

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', 'HomeController@getHome');


    Route::get('/wage', 'WageController@getOverview');
    Route::get('/wage/{year}/{month}', 'WageController@getMonthly');

    Route::get('/product/id/{id}', 'ProductController@getById');

    Route::get('/produce', 'ProduceController@getOverview');
    Route::get('/produce/{year}/{month}', 'ProduceController@getMonthly');
    Route::get('/produce/create', 'ProduceController@getCreate');
    Route::post('/produce/create', 'ProduceController@postCreate');
    Route::get('/produce/search', 'ProduceController@getSearch');
    Route::post('/produce/search', 'ProduceController@postSearch');
    Route::get('/produce/edit/id/{id}', 'ProduceController@getEditId');
    Route::post('/produce/edit/id/{id}', 'ProduceController@postEditId');

    Route::get('/install', 'InstallController@getOverview');
    Route::get('/install/{year}/{month}', 'InstallController@getMonthly');
    Route::get('/install/create', 'InstallController@getCreate');
    Route::post('/install/create', 'InstallController@postCreate');
    Route::get('/install/search', 'InstallController@getSearch');
    Route::post('/install/search', 'InstallController@postSearch');
    Route::get('/install/id/{id}', 'InstallController@getIdRedirect');
    Route::get('/install/edit/id/{id}', 'InstallController@getEditId');
    Route::post('/install/edit/id/{id}', 'InstallController@postEditId');

    Route::get('/sale', 'SaleController@getOverview');
    Route::get('/sale/id/{id}', 'SaleController@getById');

    Route::get('/testing', function () {
        \Mail::send([], [], function ($message) {
            $message->to('sherryzhang98@126.com')
                ->subject('嗨，这就是你要的网站！')
                ->setBody('是的，我就是邮件推送功能。哈哈哈哈哈！');
        });

        return 'Basic, plain text email sent.';
    });

});
