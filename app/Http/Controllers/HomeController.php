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
}
