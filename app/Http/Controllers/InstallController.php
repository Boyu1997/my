<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InstallController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        $recent_month = \App\Install::recentMonth();
        $recent_monthly_summery = \App\Install::recentMonthlySummery($user, $employee, $privilege);
        return \View::make('install.overview', compact('user', 'employee', 'privilege', 'recent_month', 'recent_monthly_summery'));
    }

    public function getCreate() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $produces_for_dropdown = \App\Produce::producesSerialNumberForDropdown();
        $employees_for_dropdown = \App\User::employeesNameForDropdown();
        return view('install.create', compact('user', 'employee', 'privilege', 'produces_for_dropdown', 'employees_for_dropdown'));
    }

    public function postCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $this->validate($request, [
            'specification' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'end_at' => 'required|date_format:"Y/m/d"',
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

        \Session::flash('success', 'A new install record is added.');
        return redirect('/install');
    }

    public function getSearch() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $employees_for_dropdown = \App\User::employeesNameForDropdown();
        return view('install.search', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postSearch(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $this->validate($request, [
            'specification' => 'max:300',
            'start_at' => 'date_format:"Y/m/d"',
            'end_at' => 'date_format:"Y/m/d"',
            'person_hour' => 'max:10',
            'employee_id' => 'integer'
        ]);
        if($request->employee_id == 0) $request->employee_id = '%';
        $installs = \DB::table('installs')
            ->where('specification', 'like', '%'.$request->specification.'%')
            ->where('start_at', 'like', '%'.$request->start_at.'%')
            ->where('end_at', 'like', '%'.$request->end_at.'%')
            ->where('person_hour', 'like', '%'.$request->person_hour.'%')
            ->where('employee_id', 'like', $request->employee_id)
            ->select('start_at', 'end_at', 'person_hour', 'id')->get();
        return view('install.searchResult', compact('user', 'employee', 'privilege', 'installs'));
    }

    public function getEditId($id) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $install = \App\Install::where('id', '=', $id)->first();
        $employees_for_dropdown = \App\User::employeesNameForDropdown();
        return view('install.edit', compact('user', 'employee', 'privilege', 'install', 'employees_for_dropdown'));
    }

    public function postEditId(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/install');
        }
        $this->validate($request, [
            'id' => 'integer',
            'model' => 'required',
            'serial_number' => 'required',
            'finished_at' => 'required|date_format:"Y/m/d"',
            'sold_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        $produce = \App\Produce::find($request->id);
        $produce->model = $request->model;
        $produce->serial_number = $request->serial_number;
        $produce->finished_at = $request->finished_at;
        $produce->sold_at = $request->sold_at;
        $produce->sold_to = $request->sold_to;
        $produce->employee_id = $request->employee_id;
        $produce->save();
        \Session::flash('success', 'The produce record for '.$request->serial_number.' is edit.');
        return redirect('/install');
    }

    public function getMonthly($year = null, $month = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        $formated_date = $year.'/'.$month.'%';
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            $installs = \DB::table('installs')->where('employee_id', '=', $employee->id)->where('start_at', 'like', $formated_date)->select('start_at', 'end_at', 'person_hour')->get();
            $have_id = false;
        }
        else
        {
            $installs = \DB::table('installs')->where('start_at', 'like', $formated_date)->select('start_at', 'end_at', 'person_hour', 'id')->get();
            $have_id = true;
        }
        return view('install.monthly', compact('user', 'employee', 'privilege', 'year', 'month', 'installs', 'have_id'));
    }

    public function getIdRedirect($id) {
        $produce_id = \App\Produce::where('install_id', '=', $id)->pluck('id')->first();
        $link = '/product/id/'.$produce_id;
        return redirect($link);
    }
}
