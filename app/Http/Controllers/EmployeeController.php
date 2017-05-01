<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeController extends Controller
{
    public function getOverview()
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees = \App\Employee::with('user')->get();
        return \View::make('employee.overview', compact('user', 'employee', 'privilege', 'employees'));
    }

    public function getCreate()
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $users_last_name_for_dropdown = \App\Employee::usersLastNameForDropdown();
        return \View::make('employee.create', compact('user', 'employee', 'privilege', 'users_last_name_for_dropdown'));
    }

    public function postCreate(Request $request)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'username' => 'required|not_in:0',
            'position' => 'required|max:30',
            'company_email' => 'email|max:100',
            'company_cellphone' => 'integer|digits_between:2,30',
            'monthly_base' => 'required|integer|max:1000000',
            'attendance_stander' => 'integer|max:1000000',
            'attendance_deduction' => 'integer|max:1000000',
            'cellphone_grant' => 'integer|max:1000000',
            'person_hour_standard' => 'integer|max:1000000',
            'trip_allowance_standard' => 'integer|max:1000000',
            'piece_rate_stander' => 'integer|max:1000000',
            'piece_rate_award_stander' => 'integer|max:1000000',
            'piece_rate_award_requirement' => 'integer|max:1000000',
            'master_admin' => 'required|boolean'
        ]);
        if ($request->master_admin) {
            $request->produce = 0;
            $request->install = 0;
            $request->maintenance = 0;
            $request->sale = 0;
            $request->contract = 0;
            $request->trip = 0;
        } else {
            $this->validate($request, [
                'stock' => 'required|boolean',
                'produce' => 'required|boolean',
                'install' => 'required|boolean',
                'maintenance' => 'required|boolean',
                'sale' => 'required|boolean',
                'contract' => 'required|boolean',
                'trip' => 'required|boolean'
            ]);
        }
        $the_user = \App\User::where('username', '=', $request->username)->first();
        $the_employee = new \App\Employee();
        $the_employee->position = $request->position;
        $the_employee->company_email = $request->company_email;
        $the_employee->company_cellphone = $request->company_cellphone;
        $the_wage = new \App\Wage();
        $the_wage->monthly_base = $request->monthly_base;
        $the_wage->attendance_stander = $request->attendance_stander;
        $the_wage->attendance_deduction = $request->attendance_deduction;
        $the_wage->cellphone_grant = $request->cellphone_grant;
        $the_wage->person_hour_standard = $request->person_hour_standard;
        $the_wage->trip_allowance_standard = $request->trip_allowance_standard;
        $the_wage->piece_rate_stander = $request->piece_rate_stander;
        $the_wage->piece_rate_award_stander = $request->piece_rate_award_stander;
        $the_wage->piece_rate_award_requirement = $request->piece_rate_award_requirement;
        $the_wage->save();
        $the_privilege = new \App\Privilege();
        $the_privilege->master_admin = $request->master_admin;
        $the_privilege->stock = $request->stock;
        $the_privilege->produce = $request->produce;
        $the_privilege->install = $request->install;
        $the_privilege->maintenance = $request->maintenance;
        $the_privilege->sale = $request->sale;
        $the_privilege->contract = $request->contract;
        $the_privilege->trip = $request->trip;
        $the_privilege->save();
        $the_employee->wage_id = $the_wage->id;
        $the_employee->privilege_id = $the_privilege->id;
        $the_employee->save();
        $the_user->employee_id = $the_employee->id;
        $the_user->save();
        \Session::flash('success', '成功添加了员工'.$the_user->last_name.$the_user->first_name.'的信息。');
        return redirect('/employee');
    }

    public function getEdit($id)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $the_employee = \App\Employee::where('id', '=', $id)->with('user', 'wage', 'privilege')->first();
        return \View::make('employee.edit', compact('user', 'employee', 'privilege', 'the_employee'));
    }

    public function postEdit($id, Request $request)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'id' => 'required|integer',
            'position' => 'required|max:30',
            'company_email' => 'email|max:100',
            'company_cellphone' => 'integer|digits_between:2,30',
            'monthly_base' => 'required|integer|max:1000000',
            'attendance_stander' => 'integer|max:1000000',
            'attendance_deduction' => 'integer|max:1000000',
            'cellphone_grant' => 'integer|max:1000000',
            'person_hour_standard' => 'integer|max:1000000',
            'trip_allowance_standard' => 'integer|max:1000000',
            'piece_rate_stander' => 'integer|max:1000000',
            'piece_rate_award_stander' => 'integer|max:1000000',
            'piece_rate_award_requirement' => 'integer|max:1000000',
            'master_admin' => 'required|boolean'
        ]);
        if ($request->master_admin) {
            $request->produce = 0;
            $request->install = 0;
            $request->maintenance = 0;
            $request->sale = 0;
            $request->contract = 0;
            $request->trip = 0;
        } else {
            $this->validate($request, [
                'stock' => 'required|boolean',
                'produce' => 'required|boolean',
                'install' => 'required|boolean',
                'maintenance' => 'required|boolean',
                'sale' => 'required|boolean',
                'contract' => 'required|boolean',
                'trip' => 'required|boolean'
            ]);
        }
        if ($request->id != $id) {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/produce');
        }
        $the_employee = \App\Employee::find($id);
        $the_employee->position = $request->position;
        $the_employee->company_email = $request->company_email;
        $the_employee->company_cellphone = $request->company_cellphone;
        $the_employee->save();
        $the_wage = \App\Wage::find($the_employee->wage_id);
        $the_wage->monthly_base = $request->monthly_base;
        $the_wage->attendance_stander = $request->attendance_stander;
        $the_wage->attendance_deduction = $request->attendance_deduction;
        $the_wage->cellphone_grant = $request->cellphone_grant;
        $the_wage->person_hour_standard = $request->person_hour_standard;
        $the_wage->trip_allowance_standard = $request->trip_allowance_standard;
        $the_wage->piece_rate_stander = $request->piece_rate_stander;
        $the_wage->piece_rate_award_stander = $request->piece_rate_award_stander;
        $the_wage->piece_rate_award_requirement = $request->piece_rate_award_requirement;
        $the_wage->save();
        $the_privilege = \App\Privilege::find($the_employee->privilege_id);
        $the_privilege->master_admin = $request->master_admin;
        $the_privilege->stock = $request->stock;
        $the_privilege->produce = $request->produce;
        $the_privilege->install = $request->install;
        $the_privilege->maintenance = $request->maintenance;
        $the_privilege->sale = $request->sale;
        $the_privilege->contract = $request->contract;
        $the_privilege->trip = $request->trip;
        $the_privilege->save();
        \Session::flash('success', '成功修改了员工'.$the_employee->user->last_name.$the_employee->user->first_name.'的信息。');
        return redirect('/employee');
    }

    //ajax functions
    public function getCreateLastName()
    {
        if (\Request::ajax()) {
            $users = \App\User::where('employee_id', '=', null)->where('last_name', '=', $_GET["last_name"])->get();
            $data = "<option value='0'>请选择名字</option>";
            foreach ($users as $user) {
                $data = $data.'<option value="'.$user->first_name.'">'.$user->first_name.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateFirstName()
    {
        if (\Request::ajax()) {
            $users = \App\User::where('employee_id', '=', null)->where('last_name', '=', $_GET["last_name"])->where('first_name', '=', $_GET["first_name"])->get();
            $data = "<option value='0'>请选择用户名</option>";
            foreach ($users as $user) {
                $data = $data.'<option value="'.$user->username.'">'.$user->username.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }
}
