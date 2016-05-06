<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProduceController extends Controller
{
    public function getOverview() {
        return view('produce.overview');
    }

    public function getCreate() {
        return view('produce.create');
    }

    public function postCreate() {
        return view('produce.create');
    }

    public function getMonthly($year = null, $month = null) {
        return view('produce.monthly', compact('year', 'month'));
    }

    public function getById() {
        return view('produce.overview');
    }
}
