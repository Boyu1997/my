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

    Route::group(['prefix' => 'produce'], function () {
        Route::get('/', 'ProduceController@getOverview');
        Route::get('/{year}/{month}', 'ProduceController@getMonthly');
        Route::get('/create', 'ProduceController@getCreate');
        Route::post('/create', 'ProduceController@postCreate');
        Route::get('/current', 'ProduceController@getCurrent');
        Route::get('/search', 'ProduceController@getSearch');
        Route::post('/search', 'ProduceController@postSearch');
        Route::get('/edit/id/{id}', 'ProduceController@getEditId');
        Route::post('/edit/id/{id}', 'ProduceController@postEditId');
        Route::post('/delete/id/{id}', 'ProduceController@postDeleteId');
    });

    Route::group(['prefix' => 'install'], function () {
        Route::get('/', 'InstallController@getOverview');
        Route::get('/{year}/{month}', 'InstallController@getMonthly');
        Route::get('/create', 'InstallController@getCreate');
        Route::post('/create', 'InstallController@postCreate');
        Route::get('/search', 'InstallController@getSearch');
        Route::post('/search', 'InstallController@postSearch');
        Route::get('/id/{id}', 'InstallController@getIdRedirect');
        Route::get('/edit/id/{id}', 'InstallController@getEditId');
        Route::post('/edit/id/{id}', 'InstallController@postEditId');
    });

    Route::group(['prefix' => 'sale'], function () {
        Route::get('/', 'SaleController@getOverview');
        Route::get('/create', 'SaleController@getCreate');
        Route::post('/create', 'SaleController@postCreate');
        Route::get('/id/{id}', 'SaleController@getById');
        Route::get('/agent/create', 'SaleController@getCreateAgent');
        Route::get('/customer/create', 'SaleController@getCreateCustomer');
        Route::post('/customer/create', 'SaleController@postCreateCustomer');

        //ajax rotes
        Route::get('/getCreateNation', 'SaleController@getCreateNation');
        Route::get('/getCreateProvince', 'SaleController@getCreateProvince');
        Route::get('/getCreateCity', 'SaleController@getCreateCity');
        Route::get('/customer/getCreateNation', 'SaleController@getCreateNation');
        Route::get('/customer/getCreateProvince', 'SaleController@getCreateProvince');
    });

    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'EmployeeController@getOverview');
        Route::get('/edit/id/{id}', 'EmployeeController@getEdit');
        Route::post('/edit/id/{id}', 'EmployeeController@postEdit');
    });





    Route::get('/testing', function () {
        \Mail::send([], [], function ($message) {
            $message->to('jbyjiangboyu@126.com')
                ->subject('艾美康办公系统-testing')
                ->setBody('This message is to test if the e-mail sending function works.');
        });
        return 'Basic, plain text email sent.';
    });

});
