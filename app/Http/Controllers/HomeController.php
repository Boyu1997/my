<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function getHome() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        return view('home', compact('user', 'employee', 'privilege'));
    }

    public function getData($name) {
        $agent = new \App\Agent();
        $agent->name = $name;
        $agent->nation = "test";
        $agent->province = "test";
        $agent->city = "test";
        $agent->address = "test";
        $agent->phone_number = "test";
        $agent->fax = "test";
        $agent->remark = "test";
        $agent->save();
    }
}
