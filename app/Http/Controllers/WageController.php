<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WageController extends Controller
{
    public function getOverview()
    {
        return view('wage.overview');
    }

    public function getMonthly($year = null, $month = null)
    {
        return view('wage.monthly', compact('year', 'month'));
    }
}
