<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function getData(Request $request) {
        $test = new \App\Test();
        $test->type = $_GET['type'];
        $test->temp_1 = $_GET['temp_1'];
        $test->humi_1 = $_GET['humi_1'];

        $test->save();
        return '200';
    }
}
