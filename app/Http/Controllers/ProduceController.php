<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProduceController extends Controller
{
    public function getOverview() {
        $recent_monthly_summery = \App\Produce::recentMonthlySummery();
        $recent_month = \App\Produce::recentMonth();
        return \View::make('produce.overview', compact('recent_month', 'recent_monthly_summery'));
    }

    public function getCreate() {
        $employees_for_dropdown = \App\User::employeesNameForDropdown();
        return view('produce.create', compact('employees_for_dropdown'));
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'model' => 'required',
            'serial_number' => 'required',
            'finished_at' => 'required|date_format:"Y/m/d"',
            'sold_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('model', 'serial_number', 'finished_at', 'sold_at', 'sold_to', 'employee_id');
        $produce = \App\Produce::create($data);
        return view('produce.overview');
    }

    public function getMonthly($year = null, $month = null) {
        return view('produce.monthly', compact('year', 'month'));
    }

    public function getById() {
        return view('produce.overview');
    }
}
