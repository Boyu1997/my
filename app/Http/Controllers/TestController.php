<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function getData(Request $request) {
        $test = new \App\Test();
        $test->data = $_GET['data'];
        $test->save();
        return $_GET['data'];
    }
}
