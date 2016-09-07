<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProduceController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $recent_monthly_summery = \App\Produce::recentMonthlySummery($user, $employee, $privilege);
        $recent_month = \App\Produce::recentMonth();
        if ($privilege->master_admin==0)
        {
            $recent_monthly_summery = [$recent_monthly_summery[2], $recent_monthly_summery[3], $recent_monthly_summery[4]];
            $recent_month = [$recent_month[2], $recent_month[3], $recent_month[4]];
        }
        return \View::make('produce.overview', compact('user', 'employee', 'privilege', 'recent_month', 'recent_monthly_summery'));
    }

    public function getMonthly($year = null, $month = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $formated_date = $year.'/'.$month.'%';
        if($privilege->master_admin==0)
        {
            $produces = \DB::table('produces')->where('employee_id', '=', $employee->id)->where('end_at', 'like', $formated_date)->select('model', 'serial_number', 'end_at')->get();
            $have_id = false;
        }
        else
        {
            $produces = \DB::table('produces')->where('end_at', 'like', $formated_date)->select('model', 'serial_number', 'end_at', 'id')->get();
            $have_id = true;
        }
        return view('produce.monthly', compact('user', 'employee', 'privilege', 'year', 'month', 'produces', 'have_id'));
    }

    public function getCurrent() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $produces = \App\Produce::where('end_at', '=', '')->with('employee.user')->select('model', 'serial_number', 'start_at', 'employee_id', 'id')->get();
        return view('produce.current', compact('user', 'employee', 'privilege', 'produces'));
    }

    public function getCreate() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        if(!$privilege->master_admin && \App\Produce::where('employee_id', '=', $employee->id)->where('end_at', '=', '')->count())
        {
            \Session::flash('danger', '请先完成当前生产，再创建新的生产。');
            return redirect('/produce/edit/id/'.\App\Produce::where('employee_id', '=', $employee->id)->where('end_at', '=', '')->pluck('id')->first());
        }
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();

        return view('produce.create', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'model' => 'required',
            'serial_number' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'end_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('model', 'serial_number', 'start_at', 'end_at', 'employee_id');
        if (!$privilege->master_admin && sizeof($data['employee_id']))
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/produce');
        }
        $data['employee_id'] = $employee->id;
        $produce = \App\Produce::create($data);
        \Session::flash('success', '成功创建了新的生产记录。');
        return redirect('/produce');
    }

    public function getSearch() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || !$privilege->master_admin)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();
        return view('produce.search', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postSearch(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || !$privilege->master_admin)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'model' => 'max:10',
            'serial_number' => 'max:50',
            'start_at' => 'date_format:"Y/m/d"',
            'end_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'integer'
        ]);
        if ((!$privilege->master_admin && sizeof($request->employee_id)))
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/produce');
        }
        if (!sizeof($request->employee_id)) $request->employee_id = $employee->id;
        if($request->employee_id == 0) $request->employee_id = '%';
        $produces =  \App\Produce::where('model', 'like', '%'.$request->model.'%')
            ->where('serial_number', 'like', '%'.$request->serial_number.'%')
            ->where('start_at', 'like', '%'.$request->start_at.'%')
            ->where('end_at', 'like', '%'.$request->end_at.'%')
            ->where('employee_id', 'like', $request->employee_id)
            ->with('employee.user')
            ->select('model', 'serial_number', 'start_at', 'end_at', 'employee_id', 'id')->get();
        return view('produce.searchResult', compact('user', 'employee', 'privilege', 'produces'));
    }

    public function getEditId($id) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        $produce = \App\Produce::where('id', '=', $id)->first();
        if(sizeof($privilege)==0 || (!$privilege->master_admin && !$privilege->produce) || (!$privilege->master_admin && $produce->employee_id != $employee->id))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Produce::employeesNameForDropdown();
        return view('produce.edit', compact('user', 'employee', 'privilege', 'produce', 'employees_for_dropdown'));
    }

    public function postEditId($id, Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'id' => 'integer',
            'model' => 'required',
            'serial_number' => 'required',
            'start_at' => 'required|date_format:"Y/m/d"',
            'end_at' => 'date_format:"Y/m/d"',
            'employee_id' => 'not_in:0'
        ]);
        if ((!$privilege->master_admin && sizeof($request->employee_id)) || $request->id != $id)
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/produce');
        }
        $produce = \App\Produce::find($request->id);
        $produce->model = $request->model;
        $produce->serial_number = $request->serial_number;
        $produce->start_at = $request->start_at;
        $produce->end_at = $request->end_at;
        if (sizeof($request->employee_id)) $produce->employee_id = $request->employee_id;
        $produce->save();
        \Session::flash('success', '序列号为'.$request->serial_number.'的生产记录已经成功变更。');
        return redirect('/produce');
    }

    public function postDeleteId($id, Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $produce = \App\Produce::find($request->id);
        if ($request->id != $id || (!$privilege->master_admin && $produce->employee_id != $employee->id))
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/produce');
        }
        $produce = \App\Produce::find($request->id);
        $produce->delete();
        \Session::flash('success', '序列号为'.$produce->serial_number.'的生产记录已经成功删除。');
        return redirect('/produce');
    }
}
