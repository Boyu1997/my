<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InstallController extends Controller
{
    public function getOverview() {
        $recent_month = \App\Install::recentMonth();
        $recent_monthly_summery = \App\Install::recentMonthlySummery();
        return \View::make('install.overview', compact('recent_month', 'recent_monthly_summery'));
    }

    public function getCreate() {
        $produces_for_dropdown = \App\Produce::producesSerialNumberForDropdown();
        $employees_for_dropdown = \App\User::employeesNameForDropdown();
        return view('install.create', compact('produces_for_dropdown', 'employees_for_dropdown'));
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'specification' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'end_at' => 'required',
            'person_hour' => 'required|integer',
            'employee_id' => 'not_in:0',
            'produce_id' => 'not_in:0'
        ]);
        $data = $request->only('specification', 'start_at', 'end_at', 'person_hour', 'employee_id');
        $install = new \App\Install();
        foreach ($data as $key => $value) {
            $install->$key = $value;
        }
        $install->save();
        $produce_id = $request->produce_id;
        $produce = \App\Produce::where('id', '=', $produce_id)->first();
        $produce->install_id = $install->id;
        $produce->save();

        \Session::flash('success', 'A new produce record is added.');
        return redirect('/');
    }

    public function getMonthly($year = null, $month = null) {
        $formated_date = $year.'/'.$month.'%';
        $user = \Auth::user();
        $employee = \App\Employee::where('id', '=', $user->employee_id)->first();
        if($employee->privilege_id)
        {
            $privilege = \App\Privilege::where('id', '=', $employee->privilege_id)->first();
            if($privilege->master_admin)
            {
                $installs = \DB::table('installs')->where('start_at', 'like', $formated_date)->select('start_at', 'end_at', 'person_hour', 'id')->get();
                $have_id = true;
            }
            else
            {
                $installs = \DB::table('installs')->where('employee_id', '=', $employee->id)->where('start_at', 'like', $formated_date)->select('start_at', 'end_at', 'person_hour')->get();
                $have_id = false;
            }
        }
        else
        {
            $installs = \DB::table('installs')->where('employee_id', '=', $employee->id)->where('start_at', 'like', $formated_date)->select('start_at', 'end_at', 'person_hour')->get();
            $have_id = false;
        }
        return view('install.monthly', compact('year', 'month', 'installs', 'have_id'));
    }

    public function getById() {
        return view('install.overview');
    }
}
