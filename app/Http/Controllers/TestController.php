<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function getData(Request $request) {
        $test = new \App\Test();
        $test->type = $_GET['tp'];
        $test->temperature_1 = $_GET['t1'];
        $test->humidity_1 = $_GET['h1'];
        $test->temperature_2 = $_GET['t2'];
        $test->humidity_2 = $_GET['h2'];

        $test->critical_error = $_GET['cr'];

        $test->compressor_1 = $_GET['c0'];
        $test->exchanger_1 = $_GET['c2'];
        $test->fan_1 = $_GET['c4'];
        $test->heater_1 = $_GET['c6'];
        $test->heater_2 = $_GET['c7'];
        $test->humidifier = $_GET['c8'];

        $test->save();
        return '200';
    }

    public function getRead() {
        $datas = \App\Test::orderBy('id', 'DESC')->select('id', 'created_at', 'type', 'critical_error', 'temperature_1', 'humidity_1', 'temperature_2', 'humidity_2', 'compressor_1', 'exchanger_1', 'fan_1', 'heater_1', 'heater_2', 'humidifier')->get();
        return view('test.read', compact('datas'));
    }
}
