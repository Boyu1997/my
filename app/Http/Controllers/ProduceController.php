<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProduceController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $recent_monthly_summery = \App\Produce::recentMonthlySummery($user, $employee, $privilege);
        $recent_month = \App\Produce::recentMonth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            $recent_monthly_summery = [$recent_monthly_summery[2], $recent_monthly_summery[3], $recent_monthly_summery[4]];
            $recent_month = [$recent_month[2], $recent_month[3], $recent_month[4]];
        }
        return \View::make('produce.overview', compact('user', 'employee', 'privilege', 'recent_month', 'recent_monthly_summery'));
    }

    public function getMonthly($year = null, $month = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $formated_date = $year.'/'.$month.'%';
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            $produces = \DB::table('produces')->where('employee_id', '=', $employee->id)->where('finished_at', 'like', $formated_date)->select('model', 'serial_number', 'finished_at')->get();
            $have_id = false;
        }
        else
        {
            $produces = \DB::table('produces')->where('finished_at', 'like', $formated_date)->select('model', 'serial_number', 'finished_at', 'id')->get();
            $have_id = true;
        }
        return view('produce.monthly', compact('user', 'employee', 'privilege', 'year', 'month', 'produces', 'have_id'));
    }

    public function getCreate() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();

        return view('produce.create', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'model' => 'required',
            'serial_number' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'finished_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('model', 'serial_number', 'start_at', 'finished_at', 'employee_id');
        $produce = \App\Produce::create($data);
        \Session::flash('success', 'A new produce record is added.');
        return redirect('/produce');
    }

    public function getSearch() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();
        return view('produce.search', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postSearch(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'model' => 'max:10',
            'serial_number' => 'max:50',
            'start_at' => 'date_format:"Y/m/d"',
            'finished_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'integer'
        ]);
        if($request->employee_id == 0) $request->employee_id = '%';
        $produces = \DB::table('produces')
            ->where('model', 'like', '%'.$request->model.'%')
            ->where('serial_number', 'like', '%'.$request->serial_number.'%')
            ->where('start_at', 'like', '%'.$request->start_at.'%')
            ->where('finished_at', 'like', '%'.$request->finished_at.'%')
            ->where('employee_id', 'like', $request->employee_id)
            ->select('model', 'serial_number', 'start_at', 'finished_at', 'employee_id', 'id')->get();
        return view('produce.searchResult', compact('user', 'employee', 'privilege', 'produces'));
    }

    public function getEditId($id) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $produce = \App\Produce::where('id', '=', $id)->first();
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();
        return view('produce.edit', compact('user', 'employee', 'privilege', 'produce', 'employees_for_dropdown'));
    }

    public function postEditId(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->create_produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'id' => 'integer',
            'model' => 'required',
            'serial_number' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'finished_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        $produce = \App\Produce::find($request->id);
        $produce->model = $request->model;
        $produce->serial_number = $request->serial_number;
        $produce->start_at = $request->start_at;
        $produce->finished_at = $request->finished_at;
        $produce->employee_id = $request->employee_id;
        $produce->save();
        \Session::flash('success', 'The produce record for '.$request->serial_number.' is edit.');
        return redirect('/produce');
    }
}
