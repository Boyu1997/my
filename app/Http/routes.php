<?php

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');

//Testing Routes
Route::get('/test/data', 'TestController@getData');


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
        Route::get('/create/new', 'SaleController@getCreateNew');
        Route::post('/create/new', 'SaleController@postCreateNew');
        Route::get('/create/ongoing', 'SaleController@getCreateOngoing');
        Route::post('/create/ongoing', 'SaleController@postCreateOngoing');
        Route::get('/id/{id}', 'SaleController@getById');
        Route::get('/agent/create', 'SaleController@getCreateAgent');
        Route::post('/agent/create', 'SaleController@postCreateAgent');
        Route::get('/customer/create', 'SaleController@getCreateCustomer');
        Route::post('/customer/create', 'SaleController@postCreateCustomer');

        //ajax rotes
        Route::get('/create/getCreateNewNation', 'SaleController@getCreateCustomerNation');
        Route::get('/create/getCreateNewProvince', 'SaleController@getCreateCustomerProvince');
        Route::get('/create/getCreateNewCity', 'SaleController@getCreateCustomerCity');
        Route::get('/create/getCreateOngoingSale', 'SaleController@getCreateOngoingSale');

        Route::get('/create/getCreateOngoingAgentNation', 'SaleController@getCreateAgentNation');
        Route::get('/create/getCreateOngoingAgentProvince', 'SaleController@getCreateAgentProvince');
        Route::get('/create/getCreateOngoingAgentCity', 'SaleController@getCreateAgentCity');
        Route::get('/create/getCreateOngoingComplementNation', 'SaleController@getCreateComplementNation');
        Route::get('/create/getCreateOngoingComplementProvince', 'SaleController@getCreateComplementProvince');
        Route::get('/create/getCreateOngoingComplementCity', 'SaleController@getCreateComplementCity');
        Route::get('/create/getCreateOngoingCustomerNation', 'SaleController@getCreateCustomerNation');
        Route::get('/create/getCreateOngoingCustomerProvince', 'SaleController@getCreateCustomerProvince');
        Route::get('/create/getCreateOngoingCustomerCity', 'SaleController@getCreateCustomerCity');
        Route::get('/create/getCreateOngoingOtherNation', 'SaleController@getCreateOtherNation');
        Route::get('/create/getCreateOngoingOtherProvince', 'SaleController@getCreateOtherProvince');
        Route::get('/create/getCreateOngoingOtherCity', 'SaleController@getCreateOtherCity');


        Route::get('/agent/getCreateNation', 'SaleController@getCreateAgentNation');
        Route::get('/agent/getCreateProvince', 'SaleController@getCreateAgentProvince');
        Route::post('/agent/postCreateContact', 'SaleController@postCreateAgentContact');
        Route::get('/customer/getCreateNation', 'SaleController@getCreateCustomerNation');
        Route::get('/customer/getCreateProvince', 'SaleController@getCreateCustomerProvince');
        Route::post('/customer/postCreateContact', 'SaleController@postCreateCustomerContact');
    });

    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'EmployeeController@getOverview');
        Route::get('/create', 'EmployeeController@getCreate');
        Route::post('/create', 'EmployeeController@postCreate');
        Route::get('/edit/id/{id}', 'EmployeeController@getEdit');
        Route::post('/edit/id/{id}', 'EmployeeController@postEdit');

        //ajax rotes
        Route::get('/getCreateLastName', 'EmployeeController@getCreateLastName');
        Route::get('/getCreateFirstName', 'EmployeeController@getCreateFirstName');
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
